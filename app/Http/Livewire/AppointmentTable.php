<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Appointment;

class AppointmentTable extends LivewireTableComponent
{
    use WithPagination;
    
    protected $model = Appointment::class;
    public $showButtonOnHeader = true;
    public $showFilterOnHeader = true;
    public $buttonComponent = 'appointments.add-button';
    protected $FilterComponent = ['appointments.filter-button', Appointment::STATUS_ARR];
    protected $startDate = '';
    protected $endDate = '';
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage', 'changeDateFilter'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }


    public function changeDateFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->startDate = $value[0];
        $this->endDate = $value[1];
        $this->setBuilder($this->builder());
    }

    public function changeFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->startDate = $value[0];
        $this->endDate = $value[1];
        $this->statusFilter = $value[2];
        $this->setBuilder($this->builder());
    }

    public function configure(): void
    {
        $this->setDefaultSort('appointments.created_at', 'desc');
        $this->setQueryStringStatus(false);
        $this->setPrimaryKey('id');
        $this->setQueryStringStatus(false);
    }


    public function columns(): array
    {
        return [
            Column::make(__('messages.case.patient'), "patient.patientUser.email")
                ->hideIf('patient.patientUser.email')
                ->searchable(),
            Column::make(__('messages.case.patient'), "doctor.doctorUser.email")
                ->hideIf('doctor.doctorUser.email')
                ->searchable(),
            Column::make(__('messages.case.patient'), "patient.patientUser.first_name")
                ->view('appointments.columns.patient_name')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.case.doctor'), "doctor.doctorUser.first_name")
                ->view('appointments.columns.doctor_name')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.appointment.doctor_department'), "doctor.department.title")
                ->view('appointments.columns.department')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.case.patient'), "patient_id")->hideIf(1),
            Column::make(__('messages.case.doctor'), "doctor_id")->hideIf(1),
            Column::make(__('messages.appointment.date'), "opd_date")
                ->view('appointments.columns.date')
                ->sortable(),
            Column::make("Problem", "id")
                ->hideIf('id'),
            Column::make(__('messages.common.action'), "is_completed")
                ->view('appointments.action'),
        ];
    }

    /**
     *
     * @return Builder
     */
    public function builder(): Builder
    {
        /** @var Appointment $query */
        if (! getLoggedinDoctor()) {
            if (getLoggedinPatient()) {
                $query = Appointment::query()->select('appointments.*')->with('patient', 'doctor', 'department');
                $patient = Auth::user();
                $query->whereHas('patient', function (Builder $query) use ($patient) {
                    $query->where('user_id', '=', $patient->id);
                });
            } else {
                $query = Appointment::query()->select('appointments.*')->with('patient', 'doctor', 'department');
            }
        } else {
            $doctorId = Doctor::where('user_id', getLoggedInUserId())->first();
            $query = Appointment::query()->select('appointments.*')->with('patient', 'doctor',
                'department')->where('doctor_id', $doctorId->id);
        }

        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == 2) {
                $q;
            } else {
                $q->where('is_completed', $this->statusFilter);
            }
        });
        $query->when(isset($this->startDate) && $this->endDate, function (Builder $q) {
            $q->whereBetween('opd_date', [$this->startDate, $this->endDate]);
        });


        return $query;
    }
}
