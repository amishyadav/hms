<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\OpdPatientDepartment;

class PatientOpdVisitorTable extends LivewireTableComponent
{
    protected $model = OpdPatientDepartment::class;
    public $patientOpd;
    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function mount(string $patientOpd): void
    {
        $this->patientOpd = $patientOpd;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('opd_patient_departments.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make("Opd number", "doctor_id")
                ->hideIf('doctor_id')
                ->sortable(),
            Column::make(__('messages.opd_patient.opd_number'), "opd_number")
                ->sortable(),
            Column::make(__('messages.opd_patient.appointment_date'), "appointment_date")
                ->view('opd_patient_list.columns.visit_columns.appointment_date')
                ->sortable(),
            Column::make(__('messages.doctor_opd_charge.standard_charge'), "standard_charge")
                ->view('opd_patient_list.columns.visit_columns.standard_charge')
                ->sortable(),
            Column::make(__('messages.ipd_payments.payment_mode'), "payment_mode")
                ->view('opd_patient_list.columns.visit_columns.payment_mode')
                ->sortable(),
            Column::make(__('messages.ipd_patient.doctor_id'), "doctor.doctorUser.first_name")
                ->view('opd_patient_list.columns.visit_columns.doctor_name')
                ->sortable(),
            Column::make(__('messages.ipd_patient.symptoms'), "symptoms")
                ->view('opd_patient_list.columns.visit_columns.symptoms')
                ->sortable(),
            Column::make(__('messages.ipd_patient.notes'), "notes")
                ->view('opd_patient_list.columns.visit_columns.notes')
                ->sortable(),
        ];
    }
    public function builder(): Builder
    {
        /** @var OpdPatientDepartment $query */

        $query = OpdPatientDepartment::where('patient_id', $this->patientOpd)->with('doctor');

        return $query;
    }
}
