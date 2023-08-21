<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class HospitalBillsTable extends LivewireTableComponent
{
    protected $model = User::class;
    public $showFilterOnHeader = true;
    public $showButtonOnHeader = false;
    public $paginationIsEnabled = true;
    public $FilterComponent = [
        'super_admin.users.hospital_bills_columns.filter-button', User::FILTER_STATUS_ARR, Transaction::PAYMENT_TYPES,
    ];
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'changePaymentFilter', 'resetPage'];
    public $hospitalId;
    public $paymentFilter = 0;

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
            ->setQueryStringStatus(false);
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('plan_amount')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('plan_frequency')) {
                return [
                    'class' => 'price-sec-column',
                ];
            }

            return [];
        });
    }

    /**
     * @param $param
     * @param $value
     */
    public function changeFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->statusFilter = $value;
        $this->setBuilder($this->builder());
    }

    /**
     * @param $param
     * @param $value
     */
    public function changePaymentFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->paymentFilter = $value;
        $this->setBuilder($this->builder());
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.subscription_plans.plan_name'), "subscription_plan_id")
                ->view('super_admin.users.hospital_bills_columns.plan_name'),
            Column::make(__('messages.subscription_plans.transaction'), "transaction_id")
                ->view('super_admin.users.hospital_bills_columns.transaction'),
            Column::make(__('messages.subscription_plans.amount'), "plan_amount")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_bills_columns.amount'),
            Column::make(__('messages.subscription_plans.frequency'), "plan_frequency")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_bills_columns.frequency'),
            Column::make(__('messages.subscription_plans.start_date'), "starts_at")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_bills_columns.start_date'),
            Column::make(__('messages.subscription_plans.end_date'), "ends_at")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_bills_columns.expire_date'),
            Column::make(__('messages.subscription_plans.trail_end_date'), "trial_ends_at")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_bills_columns.trial_end_date'),
            Column::make(__('messages.common.status'), "status")
                ->view('super_admin.users.hospital_bills_columns.status'),
        ];
    }

    public function builder(): Builder
    {
        $query = Subscription::with(['subscriptionPlan', 'transactions'])->where('user_id',
            $this->hospitalId)->select('subscriptions.*');

        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == 0) {
                $q;
            }
            if ($this->statusFilter == 1) {
                $q->where('status', User::ACTIVE);
            }
            if ($this->statusFilter == 2) {
                $q->where('status', User::INACTIVE);
            }
        });

        $query->when(isset($this->paymentFilter), function (Builder $q) {
            if ($this->paymentFilter == 0) {
                $q;
            } else {
                $q->whereHas('transactions', function ($q) {
                    $q->where('payment_type', $this->paymentFilter);
                });
            }
        });

        return $query;
    }
}
