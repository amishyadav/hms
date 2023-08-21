<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\OpdPatientDepartment;

class OpdPatientDepartmentTable extends LivewireTableComponent
{
    public $showButtonOnHeader = false;
    public $showFilterOnHeader = false;
    public $paginationIsEnabled = true;
    protected $model = OpdPatientDepartment::class;
    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

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
            ->setDefaultSort('opd_patient_departments.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.opd_patient.opd_number'), "id")
                ->hideIf('id')
                ->sortable(),
            Column::make(__('messages.opd_patient.opd_number'), "opd_number")
                ->view('opd_patient_list.columns.opd_no')
                ->sortable()->searchable(),
            Column::make(__('messages.ipd_patient.doctor_id'), "doctor.doctorUser.first_name")
                ->view('opd_patient_list.columns.doctor')
                ->sortable()->searchable(),
            //            Column::make(__('messages.ipd_patient.doctor_id')
            //                ,"doctor_id")->hideIf(1),
            Column::make(__('messages.opd_patient.appointment_date'), "appointment_date")
                ->view('opd_patient_list.columns.appointment_date')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.doctor_opd_charge.standard_charge'), "standard_charge")
                ->view('opd_patient_list.columns.standard_charge')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.ipd_payments.payment_mode'), "payment_mode")
                ->view('opd_patient_list.columns.payment_mode')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.user.phone'), "patient.patientUser.phone")
                ->view('opd_patient_list.columns.phone')
                ->sortable()->searchable(),
            Column::make(__('messages.opd_patient.total_visits'), "created_at")
                ->view('opd_patient_list.columns.total_visits')
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        /** @var OpdPatientDepartment $query */
        $query = OpdPatientDepartment::with([
            'patient.patientUser', 'doctor.doctorUser',
        ])->where('patient_id', getLoggedInUser()->owner_id)->select('opd_patient_departments.*');

        return $query;
    }
}
