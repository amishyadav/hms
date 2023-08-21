<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\VaccinatedPatients;

class PatientVaccinationTable extends LivewireTableComponent
{
    protected $model = VaccinatedPatients::class;
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

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('vaccinated_patients.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function mount(int $patientId)
    {
        $this->patientId = $patientId;
    }

    public function columns(): array
    {
        if (!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager|Nurse|Receptionist')) {
            $data = Column::make(__('messages.common.action'), "id")
                ->view('patients.patient_vaccination.action');
        } else {
            $data = Column::make(__('messages.common.action'), "id")->hideIf(1);

        }
        return [
            Column::make(__('messages.vaccinated_patient.vaccination_name'), "vaccination.name")
                ->sortable()->searchable(),
            Column::make(__('messages.vaccinated_patient.vaccination_name'), "vaccination_id")->hideIf(1),
            Column::make(__('messages.vaccinated_patient.serial_no'), "vaccination_serial_number")
                ->view('patients.patient_vaccination.serial_no')
                ->sortable()->searchable(),
            Column::make(__('messages.vaccinated_patient.does_no'), "dose_number")
                ->view('patients.patient_vaccination.dose_no')
                ->sortable()->searchable(),
            Column::make(__('messages.vaccinated_patient.dose_given_date'), "dose_given_date")
                ->view('patients.patient_vaccination.dose_given_date')
                ->sortable()->searchable(),
            $data
        ];
    }

    public function builder(): Builder
    {

        $query = VaccinatedPatients::whereHas('patient.patientUser')->with(['patient.patientUser.media', 'vaccination'])->where('patient_id',$this->patientId );
        return $query;
    }
}
