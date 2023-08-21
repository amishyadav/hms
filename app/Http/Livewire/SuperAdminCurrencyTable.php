<?php

namespace App\Http\Livewire;

use App\Models\SuperAdminCurrencySetting;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SuperAdminCurrencyTable extends LivewireTableComponent
{
    protected $model = SuperAdminCurrencySetting::class;
    public $showButtonOnHeader = true;
    public $buttonComponent = 'super_admin_currency_settings.add-button';
    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('super_admin_currency_settings.created_at', 'desc')
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
                ->view('super_admin_currency_settings.action'),
        ];
    }
}
