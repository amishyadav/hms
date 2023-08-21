<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubscribersTransactionTable extends LivewireTableComponent
{
    protected $model = Transaction::class;
    public $showFilterOnHeader = true;
    public $paginationIsEnabled = true;
    public $FilterComponent = ['subscription_transactions.filter-button', Transaction::PAYMENT_TYPES_FILTER];
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setQueryStringStatus(false)
            ->setDefaultSort('created_at', 'desc');

        $this->setThAttributes(function (Column $column) {

            if ($column->isField('amount')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('created_at')) {
                return [
                    'class' => 'price-sec-column',
                ];
            }


            return [];
        });

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {

            if ($columnIndex == '2') {
                return [
                    'style' => 'text-align:right',
                ];
            }
            if ($columnIndex == '3') {
                return [
                    'style' => 'text-align:center',
                ];
            }

            return [];
        });

    }

    public function changeFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->statusFilter = $value;
        $this->setBuilder($this->builder());
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.hospitals_list.hospital_name'), "user.first_name")
                ->sortable( )
                ->searchable()
                ->view('subscription_transactions.columns.user_name'),
            Column::make(__('messages.payments'), "payment_type")
                ->searchable()
                ->view('subscription_transactions.columns.payments'),
            Column::make(__('messages.invoice.amount'), "amount")
                ->sortable()
                ->searchable()
                ->view('subscription_transactions.columns.amount'),
            Column::make(__('messages.subscription_plans.transaction_date'), "created_at")
                ->sortable()
                ->searchable()
                ->view('subscription_transactions.columns.transaction_date'),
            Column::make(__('messages.subscription.payment_approved'), "is_manual_payment")
                ->view('subscription_transactions.columns.is_manual_payment'),
            Column::make(__('messages.user.status'), "status")
                ->view('subscription_transactions.columns.status'),
        ];
    }

    public function builder(): Builder
    {
        $query = Transaction::whereHas('user')->with(['transactionSubscription.subscriptionPlan', 'user'])->select('transactions.*');

        if (getLoggedInUser()->hasRole('Admin')) {
            $query->where('user_id', '=', getLoggedInUserId());
        }

        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == Transaction::ALL) {
                $q;
            } else {
                $q->where('payment_type', $this->statusFilter);
            }
        });

        return $query;
    }
}
