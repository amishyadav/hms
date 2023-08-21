<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PatientBillTable extends LivewireTableComponent
{
    protected $model = Bill::class;
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
            ->setDefaultSort('bills.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex == '3') {
                return [
                    'width' => '15%',
                    'class' => 'text-center',
                ];
            }
            if ($columnIndex == '2') {
                return [
                    'width' => '15%',
                    'class' => 'text-center',
                ];
            }
            if ($columnIndex == '1') {
                return [
                    'width' => '25%',
                    'class' => 'text-center',
                ];
            }

            return [];
        });

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('amount')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('id')) {
                return [
                    'class' => 'text-center',
                ];
            }
            if ($column->isField('bill_date')) {
                return [
                    'class' => 'price-sec-column',
                ];
            }

            return [];
        });
    }

    public function mount(int $patientId)
    {
        $this->patientId = $patientId;
    }

    public function columns(): array
    {
        if (!Auth::user()->hasRole('Patient|Doctor|Case Manager|Nurse|Receptionist')) {
            $data = Column::make(__('messages.common.action'), "id")
                ->view('patients.patient_bill.action');
        } else {
            $data = Column::make(__('messages.common.action'), "id")->hideIf(1);

        }

        return [
            Column::make(__('messages.bill.bill_id'), "bill_id")
                ->view('patients.patient_bill.bill_id')
                ->sortable()->searchable(),
            Column::make(__('messages.bill.bill_date'), "bill_date")
                ->view('patients.patient_bill.bill_date')
                ->sortable()->searchable(),
            Column::make( __('messages.bill.amount'), "amount")
                ->view('patients.patient_bill.amount')
                ->sortable()->searchable(),
            $data

        ];
    }

    public function builder(): Builder
    {
        $query = Bill::select('bills.*')->where('patient_id',$this->patientId);

        return $query;
    }
}
