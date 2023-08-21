<?php

namespace App\Http\Livewire;

use App\Models\Subscribe;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubscribeTable extends LivewireTableComponent
{
    protected $model = Subscribe::class;
    public $showFilterOnHeader = false;
    public $showButtonOnHeader = false;
    public $paginationIsEnabled = false;
    protected $listeners = ['refresh' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('subscribes.created_at', 'desc')
            ->setQueryStringStatus(false);

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex == '1') {
                return [
                    'class' => 'text-center',
                    'width' => '8%',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.user.email'), "email")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('subscribe.columns.action'),
        ];
    }

    public function builder(): Builder
    {
        return Subscribe::select('subscribes.*');
    }
}
