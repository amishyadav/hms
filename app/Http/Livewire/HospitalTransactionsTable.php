<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class HospitalTransactionsTable extends LivewireTableComponent
{
    protected $model = Transaction::class;
    public $showFilterOnHeader = true;
    public $showButtonOnHeader = false;
    public $paginationIsEnabled = true;
    public $FilterComponent = [
        'super_admin.users.hospital_transactions_columns.filter-button', Transaction::PAYMENT_TYPES,
    ];
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];
    public $hospitalId;

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
            ->setDefaultSort('transactions.created_at', 'desc')
            ->setQueryStringStatus(false);
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
                    'class' => 'd-flex justify-content-center',
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
            Column::make(__('messages.subscription_plans.payment'), "payment_type")
                ->view('super_admin.users.hospital_transactions_columns.payment_type'),
            Column::make(__('messages.subscription_plans.amount'), "amount")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_transactions_columns.amount'),
            Column::make(__('messages.subscription_plans.transaction_date'), "created_at")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_transactions_columns.created_at'),
            Column::make(__('messages.common.status'), "status")
                ->sortable()
                ->view('super_admin.users.hospital_transactions_columns.status'),
        ];
    }

    public function builder(): Builder
    {
        $query = Transaction::with(['transactionSubscription.subscriptionPlan'])->where('user_id',
            $this->hospitalId);

        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == "") {
                $q;
            } else {
                $q->where('payment_type', $this->statusFilter);
            }
        });

        return $query->select('transactions.*');
    }
}
