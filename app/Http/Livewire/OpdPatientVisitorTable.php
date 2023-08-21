<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\OpdPatientDepartment;

class OpdPatientVisitorTable extends LivewireTableComponent
{
    protected $model = OpdPatientDepartment::class;
    public $opdPatientDepartment;
    public $opdPatientDepartmentId;
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
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('opd_number') || $column->isField('standard_charge') || $column->isField('payment_mode') || $column->isField('symptoms') || $column->isField('notes')) {
                return [
                    'class' => 'pt-5',
                ];
            }

            return [];
        });
        $this->setThAttributes(function(Column $column) {
            if ($column->isField('standard_charge')) {
                return [
                    'class' => 'price-column',
                ];
            }

            return [];
        });
    }

    public function mount(string $opdPatientDepartment, string $opdPatientDepartmentId): void
    {
        $this->opdPatientDepartment = $opdPatientDepartment;
        $this->opdPatientDepartmentId = $opdPatientDepartmentId;
    }

    public function columns(): array
    {
        return [
            Column::make("Patient id", "patient_id")
                ->hideIf('patient_id')
                ->sortable(),
            Column::make( __('messages.opd_patient.opd_number'), "opd_number")
                ->view('opd_patient_departments.columnVisitor.opd_number')
                ->sortable()->searchable(),
            Column::make(__('messages.ipd_patient.doctor_id'), "doctor.doctorUser.first_name")
                ->view('opd_patient_departments.columnVisitor.doctor_name')
                ->sortable()->searchable(),
            Column::make(__('messages.case.patient'), "doctor_id")->hideIf(1),
            Column::make(__('messages.opd_patient.appointment_date'), "appointment_date")
                ->view('opd_patient_departments.columnVisitor.appointment_date')
                ->sortable()->searchable(),
            Column::make(__('messages.doctor_opd_charge.standard_charge'), "standard_charge")
                ->view('opd_patient_departments.columnVisitor.standard_charge')
                ->sortable()->searchable(),
            Column::make(__('messages.ipd_payments.payment_mode'), "payment_mode")
                ->view('opd_patient_departments.columnVisitor.payment_mode')
                ->sortable(),
            Column::make(__('messages.ipd_patient.symptoms'), "symptoms")
                ->view('opd_patient_departments.columnVisitor.symptoms')
                ->sortable(),
            Column::make(__('messages.ipd_patient.notes'), "notes")
                ->view('opd_patient_departments.columnVisitor.notes')
                ->sortable(),
            Column::make(__('messages.common.action'), "id")
                ->format(function ($value, $row, Column $column) {
                    return view('opd_patient_departments.columnVisitor.action')
                        ->withValue(['visitors_id' => $this->opdPatientDepartmentId, 'data-id' => $row->id]);
                }),
        ];
    }
    public function builder(): Builder
    {
        /** @var OpdPatientDepartment $query */
        return OpdPatientDepartment::where('patient_id', $this->opdPatientDepartment);
    }
}
