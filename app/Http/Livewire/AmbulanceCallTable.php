<?php

namespace App\Http\Livewire;

use App\Models\AmbulanceCall;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AmbulanceCallTable extends LivewireTableComponent
{
    protected $model = AmbulanceCall::class;
    public $showButtonOnHeader = true;
    public $showFilterOnHeader = false;
    public $paginationIsEnabled = true;
    public $buttonComponent = 'ambulance_calls.add-button';
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
            ->setDefaultSort('ambulance_calls.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('vehicle_model') || $column->isField('driver_name') || $column->isField('date') || $column->isField('amount')) {
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

    public function columns(): array
    {
        return [
            Column::make(__('messages.ambulance_call.patient'), "patient.patientUser.first_name")
                ->view('ambulance_calls.columns.patients')
                ->sortable()->searchable(),
            Column::make(__('messages.ambulance_call.vehicle_model'), "ambulance.vehicle_model")
                ->view('ambulance_calls.columns.vehicle_model')
                ->sortable()->searchable(),
            Column::make(__('messages.ambulance_call.driver_name'), "driver_name")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.ambulance_call.date'), "date")
                ->view('ambulance_calls.columns.date')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.ambulance_call.amount'), "amount")
                ->view('ambulance_calls.columns.amount')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('ambulance_calls.action'),

        ];
    }

    public function builder():Builder
    {
        $query = AmbulanceCall::whereHas('patient.patientUser')->with(['patient.patientUser', 'ambulance']);

        return $query->select('ambulance_calls.*');

    }
}
