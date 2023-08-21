<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PatientInvoiceTable extends LivewireTableComponent
{
    protected $model = Invoice::class;
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
            ->setDefaultSort('invoices.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('invoice_id') || $column->isField('status') || $column->isField('amount')) {
                return [
                    'class' => 'pt-5',
                ];
            }
            if ($column->isField('id')) {
                return [
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
                ->view('patients.patient_invoice.action');
        } else {
            $data = Column::make(__('messages.common.action'), "id")->hideIf(1);

        }

        return [
            Column::make(__('messages.invoice.invoice_id'), "invoice_id")
                ->view('patients.patient_invoice.invoice_id')
                ->sortable()->searchable(),
            Column::make(__('messages.invoice.invoice_date'), "invoice_date")
                ->view('patients.patient_invoice.invoice_date')
                ->sortable()->searchable(),
            Column::make(__('messages.common.status'), "status")
                ->view('patients.patient_invoice.status'),
            Column::make(__('messages.invoice.amount'), "amount")
                ->view('patients.patient_invoice.amount')
                ->sortable()->searchable(),
            $data
        ];
    }

    public function builder(): Builder
    {

        $query = Invoice::select('invoices.*')->where( 'patient_id',$this->patientId );

        return $query;
    }
}
