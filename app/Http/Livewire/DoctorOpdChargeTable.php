<?php

namespace App\Http\Livewire;

use App\Models\DoctorOPDCharge;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DoctorOpdChargeTable extends LivewireTableComponent
{
    public $buttonComponent = 'doctor_opd_charges.add-button';
    public $showButtonOnHeader = true;
    protected $model = DoctorOPDCharge::class;
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
            ->setDefaultSort('doctor_opd_charges.created_at', 'desc')
            ->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('standard_charge')) {
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

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {

            if ($columnIndex == '0') {
                return [
                    'width' => '15%',
                ];
            }
            if ($columnIndex == '1') {
                return [
                    'width' => '25%',
                ];
            }
            if ($columnIndex == '2') {
                return [
                    'width' => '25%',
                    'class' => 'price-sec-column',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.case.doctor'), "doctor.doctorUser.first_name")
                ->view('doctor_opd_charges.columns.doctor')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.doctor_opd_charge.standard_charge'), "standard_charge")
                ->view('doctor_opd_charges.columns.standard_charge')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('doctor_opd_charges.action'),
        ];
    }

    /**
     * @return Builder|DoctorOPDCharge|\Illuminate\Database\Query\Builder
     */
    public function builder(): Builder
    {
        $query = DoctorOPDCharge::whereHas('doctor')->with('doctor')->select('doctor_opd_charges.*');

        return $query;
    }
}
