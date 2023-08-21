<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AdminSubscriptionTable extends LivewireTableComponent
{
    protected $model = Subscription::class;
    public $showFilterOnHeader = false;
    public $showButtonOnHeader = false;
    public $paginationIsEnabled = true;
    protected $listeners = ['refresh' => '$refresh'];

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
            if ($column->isField('starts_at')) {
                return [
                    'class' => 'price-sec-column',
                ];
            }
            if ($column->isField('ends_at')) {
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
            if ($columnIndex == '4') {
                return [
                    'style' => 'text-align:center',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.hospitals_list.hospital_name'), 'user.first_name')
                ->sortable()
                ->searchable(fn(Builder $query, $searchTerm) =>
                $query->with('user')->whereHas('user', function (Builder $q) use ($searchTerm){
                    $q->where('first_name', $searchTerm)
                        ->orWhere('first_name', 'like', '%'. $searchTerm .'%');
                }))
                ->view('subscription.columns.hospital_name'),
            Column::make(__('messages.subscription_plans.plan_name'), "subscription_plan_id")
                ->view('subscription.columns.plan_name'),
            Column::make(__('messages.subscription_plans.amount'), "plan_amount")
                ->sortable()
                ->searchable()
                ->view('subscription.columns.plan_amount'),
            Column::make(__('messages.subscription_plans.start_date'), "starts_at")
                ->sortable()
                ->searchable()
                ->view('subscription.columns.start_date'),
            Column::make(__('messages.subscription_plans.end_date'), "ends_at")
                ->sortable()
                ->searchable()
                ->view('subscription.columns.end_date'),
            Column::make(__('messages.subscription_plans.frequency'), "plan_frequency")
                ->searchable()
                ->view('subscription.columns.frequency'),
            Column::make(__('messages.common.status'), "status")
                ->view('subscription.columns.status'),
            Column::make(__('messages.common.action'), "id")
                ->sortable()
                ->view('subscription.columns.action'),
        ];
    }

    public function builder(): Builder
    {
        $query = Subscription::with(['subscriptionPlan', 'user'])
            ->select('subscriptions.*');

        return $query;
    }
}
