<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Appointment;

class PatientAppointmentTable extends LivewireTableComponent
{
    protected $model = Appointment::class;
    public $patientId;
    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function mount(int $patientId)
    {
        $this->patientId = $patientId;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('appointments.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function columns(): array
    {

        if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager'))
        {
            $data = Column::make(__('messages.common.action'), "id")
                ->view('patients.patient_appointment.action');
        }
        else{
            $data = Column::make(__('messages.common.action'), "id")->hideIf(1)
                ->view('patients.patient_appointment.action');
        }

        return [
            Column::make(__('messages.appointment.doctor'), "doctor.doctorUser.first_name")
                ->view('patients.patient_appointment.doctor')
                ->sortable()->searchable(),
            Column::make('', "doctor_id")->hideIf(1),
            Column::make(__('messages.appointment.doctor_department'), "doctor.department.title")
                ->view('patients.patient_appointment.department')
                ->sortable()->searchable(),
            Column::make(__('messages.appointment.date'), "opd_date")
                ->view('patients.patient_appointment.date')
                ->sortable()->searchable(),
            $data
        ];
    }
    public function builder(): Builder
    {
        $query = Appointment::select('appointments.*')->where('patient_id',$this->patientId );
        return $query;
    }
}
