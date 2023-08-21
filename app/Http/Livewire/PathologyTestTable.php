<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PathologyTest;

class PathologyTestTable extends LivewireTableComponent
{
    public $showButtonOnHeader = true;
    public $buttonComponent = 'pathology_tests.add-button';
    protected $model = PathologyTest::class;
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
            ->setDefaultSort('pathology_tests.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setDefaultSort('created_at', 'desc');
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('test_name') || $column->isField('short_name') || $column->isField('test_type') || $column->isField('category_id') || $column->isField('charge_category_id')) {
                return [
                    'class' => 'pt-5',
                ];
            }

            return [];
        });
//        $this->setThAttributes(function (Column $column) {
//            return [
//                'class' => 'w-100',
//            ];
//        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->hideIf("id"),
            Column::make(__('messages.pathology_test.test_name'), "test_name")
                ->sortable()->searchable()
                ->view('pathology_tests.columns.test_name'),
            Column::make(__('messages.pathology_test.short_name'), "short_name")
                ->sortable()->searchable(),
            Column::make(__('messages.pathology_test.test_type'), "test_type")
                ->sortable()->searchable(),
            Column::make(__('messages.pathology_test.category_name'), "category_id")
                ->sortable()->searchable()
                ->view('pathology_tests.columns.category_name'),
            Column::make(__('messages.pathology_test.charge_category'), "charge_category_id")
                ->sortable()->searchable()
                ->view('pathology_tests.columns.charge_category'),

            Column::make(__('messages.common.action'), "id")
                ->view('pathology_tests.action'),
        ];
    }

    public function builder(): Builder
    {
        return PathologyTest::with('pathologycategory', 'chargecategory');
    }
}
