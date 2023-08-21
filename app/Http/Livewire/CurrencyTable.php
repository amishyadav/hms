<?php

namespace App\Http\Livewire;

use App\Models\CurrencySetting;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CurrencyTable extends LivewireTableComponent
{
    protected $model = CurrencySetting::class;
    public $showButtonOnHeader = true;
    public $buttonComponent = 'currency_settings.add-button';
    protected $listeners = ['refresh' => '$refresh','resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('currency_settings.created_at', 'desc')
            ->setQueryStringStatus(false);
    }

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.currency.currency_name'), "currency_name")
                ->searchable()
                ->sortable(),
            Column::make(__('messages.currency.currency_icon'), "currency_icon")
                ->searchable()
                ->sortable(),
            Column::make(__('messages.currency.currency_code'), "currency_code")
                ->searchable()
                ->sortable(),
            Column::make(__('messages.common.action'), "id")
                ->view('currency_settings.action'),
        ];
    }
}
