<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DoctorTable extends LivewireTableComponent
{
    protected $model = Doctor::class;
    public $showFilterOnHeader = true;
    public $paginationIsEnabled = true;
    public $showButtonOnHeader = true;
    public $FilterComponent = ['doctors.filter-button', Doctor::STATUS_ARR];
    public $buttonComponent = 'doctors.add-button';
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;
        $this->setPage($pageNum, $pageName);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('doctors.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function changeFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->statusFilter = $value;
        $this->setBuilder($this->builder());
    }

    public function columns(): array
    {
        if (!Auth::user()->hasRole('Patient|Doctor|Case Manager|Nurse|Lab Technician|Pharmacist')) {
            $this->showButtonOnHeader = true;
            $this->showFilterOnHeader = true;
            $actionBtn = Column::make(__('messages.common.action'), "id")
                ->view('doctors.columns.action');
            $qualification = Column::make(__('messages.user.qualification'), "doctorUser.qualification")
                ->view('doctors.columns.qualification')
                ->sortable();
        } else {
            $this->showButtonOnHeader = false;
            $this->showFilterOnHeader = false;
            $actionBtn = Column::make(__('messages.common.action'), "id")->hideIf(1);
            $qualification = Column::make(__('messages.user.qualification'),
                "doctorUser.qualification")->sortable()->hideIf(1);

        }

        return [

            Column::make(__('messages.case.doctor'), "doctorUser.first_name")
                ->view('doctors.columns.name')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.doctor.specialist'), "specialist")
                ->searchable()
                ->sortable(),
            $qualification,
            Column::make(__('messages.common.status'), "doctorUser.status")
                ->view('doctors.columns.status'),
            $actionBtn,
        ];
    }

    public function builder(): Builder
    {
        $query = Doctor::whereHas('doctorUser')->with('doctorUser.media')->select('doctors.*');

        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == 2) {
                $q;
            } else {
                $q->whereHas('doctorUser', function ($q) {
                    $q->where('status', $this->statusFilter);
                });
            }
        });

        return $query;
    }
}
