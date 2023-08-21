<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PaymentTable extends LivewireTableComponent
{
    use WithPagination;

    protected $model = Payment::class;
    public $showButtonOnHeader = true;
    public $showFilterOnHeader = false;
    public $buttonComponent = 'payments.add-button';
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setQueryStringStatus(false);
        $this->setDefaultSort('payments.created_at', 'desc');

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

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex == '5') {
                return [
                    'width' => '12%',
                    'style' => 'padding-left:72px !important',
                ];
            }

            return [];
        });

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
            Column::make(__('messages.account.account'), "account.name")
                ->view('payments.columns.accounts')
                ->sortable()->searchable(),
            Column::make(__('messages.account.account'), "account_id")->hideIf(1),
            Column::make(__('messages.payment.payment_date'), "payment_date")
                ->view('payments.columns.payment_date')
                ->sortable()->searchable(),
            Column::make(__('messages.payment.pay_to'), "pay_to")
                ->view('payments.columns.pay_to')
                ->sortable()->searchable(),
            Column::make(__('messages.payment.amount'), "amount")
                ->view('payments.columns.amount')
                ->sortable()->searchable(),
            Column::make(__('messages.common.action'), "id")
                ->view('payments.action'),
        ];
    }
}
