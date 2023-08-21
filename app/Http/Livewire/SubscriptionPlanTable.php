<?php

namespace App\Http\Livewire;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubscriptionPlanTable extends LivewireTableComponent
{
    protected $model = SubscriptionPlan::class;
    public $showFilterOnHeader = true;
    public $paginationIsEnabled = true;
    public $showButtonOnHeader = true;
    public $FilterComponent = ['super_admin.subscription_plans.filter-button', SubscriptionPlan::PLAN_TYPE];
    public $buttonComponent = 'super_admin.subscription_plans.add-button';
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
        $this->setPrimaryKey('id')
            ->setDefaultSort('subscription_plans.created_at', 'desc')
            ->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {

            if ($column->isField('price')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('frequency')) {
                return [
                    'class' => 'price-sec-column',
                ];
            }


            return [];
        });

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {

            if ($columnIndex == '1') {
                return [
                    'style' => 'text-align:right',
                ];
            }
            if ($columnIndex == '2') {
                return [
                    'style' => 'text-align:center',
                ];
            }

            if ($columnIndex == '6') {
                return [
                    'width' => '10%',
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
            Column::make(__('messages.subscription_plans.name'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('messages.subscription_plans.price'), "price")
                ->sortable()
                ->searchable()
                ->view('super_admin.subscription_plans.columns.price'),
            Column::make(__('messages.subscription_plans.plan_type'), "frequency")
                ->sortable()
                ->view('super_admin.subscription_plans.columns.plan_type'),
            Column::make(__('messages.subscription_plans.valid_until'), "trial_days")
                ->sortable()
                ->searchable()
                ->view('super_admin.subscription_plans.columns.trial_days'),
            Column::make(__('messages.subscription_plans.active_plan'), "id")
                ->view('super_admin.subscription_plans.columns.active_plan'),
            Column::make(__('messages.subscription_plans.make_default'), "id")
                ->view('super_admin.subscription_plans.columns.is_default'),
            Column::make(__('messages.common.action'), "id")
                ->view('super_admin.subscription_plans.columns.action'),
        ];
    }

    public function builder(): Builder
    {
        $query = SubscriptionPlan::with('subscription')->select('subscription_plans.*');

        $query->when(!empty($this->statusFilter), function (Builder $q) {
            $q->where('frequency', $this->statusFilter);
        });

        return $query;
    }
}
