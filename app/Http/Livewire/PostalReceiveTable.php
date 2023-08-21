<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Postal;

class PostalReceiveTable extends LivewireTableComponent
{
    protected $model = Postal::class;
    public $showButtonOnHeader = true;
    public $showFilterOnHeader = false;
    public $paginationIsEnabled = true;
    public $buttonComponent = 'postals.columnsReceive.add-button';
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

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
        $this->setQueryStringStatus(false);
        $this->setPrimaryKey('id');
        $this->setDefaultSort('postals.created_at', 'desc');
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('reference_no') || $column->isField('from_title') || $column->isField('to_title') || $column->isField('date') || $column->isField('type')) {
                return [
                    'class' => 'p-5',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.postal.reference_no'), "reference_no")
                ->view('postals.columnsReceive.reference_no')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.postal.from_title'), "from_title")
                ->searchable()
                ->sortable(),
            Column::make(__('messages.postal.to_title'), "to_title")
                ->searchable()
                ->sortable()
                ->view('postals.columnsReceive.to_title'),
            Column::make(__('messages.postal.date'), "date")
                ->view('postals.columnsReceive.date')
                ->sortable(),
            Column::make(__('messages.incomes.attachment'), "type")
                ->view('postals.columnsReceive.attachment'),
            Column::make(__('messages.common.action'), "id")
                ->view('postals.columnsReceive.action'),

        ];
    }

    public function builder(): Builder
    {
        /** @var Postal $query */
        $query = Postal::where('type' ,'=' ,1);

        return $query;


    }
}
