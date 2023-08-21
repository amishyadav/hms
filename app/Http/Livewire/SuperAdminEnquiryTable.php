<?php

namespace App\Http\Livewire;

use App\Models\SuperAdminEnquiry;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SuperAdminEnquiryTable extends LivewireTableComponent
{
    use WithPagination;

    protected $model = SuperAdminEnquiry::class;
    public $showFilterOnHeader = true;
    public $paginationIsEnabled = true;
    public $FilterComponent = ['super_admin.enquiries.filter-button', SuperAdminEnquiry::STATUS_ARR];
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
            ->setDefaultSort('super_admin_enquiries.created_at', 'desc')
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
        return [
            Column::make(__('messages.enquiry.name'), "first_name")
                ->sortable()->searchable()
                ->view('super_admin.enquiries.columns.full_name'),
            Column::make(__('messages.enquiry.message'), "message")
                ->sortable()->searchable()
                ->view('super_admin.enquiries.columns.message'),
            Column::make(__('messages.enquiry.read'), 'status')
                ->view('super_admin.enquiries.columns.status'),
            Column::make(__('messages.common.action'), "id")
                ->view('super_admin.enquiries.columns.action'),
        ];
    }


    public function builder(): Builder
    {
        $query = SuperAdminEnquiry::query()->select('super_admin_enquiries.*');

        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == 2) {
                $q;
            } else {
                $q->where('status', $this->statusFilter);
            }
        });

        return $query;
    }
}
