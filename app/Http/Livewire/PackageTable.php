<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PackageTable extends LivewireTableComponent
{
    use WithPagination;

    public $showButtonOnHeader = true;
    public $buttonComponent = 'packages.add-button';
    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public $showFilterOnHeader = false;

    protected $model = Package::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('packages.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('total_amount')) {
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
            if ($columnIndex == '3') {
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
            Column::make(__('messages.package.package'), "name")
                ->view('packages.columns.name')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.package.discount'), "discount")
                ->view('packages.columns.discount')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.package.total_amount'), "total_amount")
                ->view('packages.columns.total_amount')
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('packages.action'),
        ];
    }
}
