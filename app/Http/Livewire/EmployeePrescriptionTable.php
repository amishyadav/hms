<?php

namespace App\Http\Livewire;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EmployeePrescriptionTable extends LivewireTableComponent
{
    protected $model = Prescription::class;
    public $showButtonOnHeader = true;
    public $paginationIsEnabled = true;
    public $buttonComponent = 'employee_prescription_list.add-button';
    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('prescriptions.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.prescription.patient'), "patient.patientUser.first_name")
                ->view('employee_prescription_list.columns.patient_name')
                ->sortable()
                ->searchable(),
            //            Column::make("Patient", "patient_id")->hideIf(1),
            Column::make(__('messages.doctor_opd_charge.doctor'), "doctor.doctorUser.first_name")
                ->view('employee_prescription_list.columns.doctor_name')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.doctor_opd_charge.doctor'), "doctor_id")->hideIf(1),
            Column::make(__('messages.prescription.medical_history'), "medical_history")
                ->view('employee_prescription_list.columns.medical_history')
                ->sortable(),
            Column::make(__('messages.common.action'), "id")
                ->view('employee_prescription_list.action'),
        ];
    }

    public function builder(): Builder
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Prescription $query */
        $query = Prescription::whereHas('patient.patientUser')->whereHas('doctor.doctorUser')->with('patient.patientUser',
            'doctor.doctorUser')->select('prescriptions.*');

//        $query->when(isset($input['status']) && $input['status'] != Prescription::STATUS_ALL,
//            function (\Illuminate\Database\Eloquent\Builder $q) use ($input) {
//                $q->where('prescriptions.status', '=', $input['status']);
//            });

        if ($user->hasRole('Doctor')) {
            $query->where('doctor_id', $user->owner_id);
        }
        if ($user->hasRole('Patient')) {
            $query->where('patient_id', $user->owner_id);
        }

        return $query;
    }
}
