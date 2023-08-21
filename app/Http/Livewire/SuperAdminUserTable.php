<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SuperAdminUserTable extends LivewireTableComponent
{
    protected $model = User::class;
    public $showFilterOnHeader = true;
    public $showButtonOnHeader = true;
    public $paginationIsEnabled = true;
    public $FilterComponent = ['super_admin.users.filter-button', User::STATUS_ARR];
    public $buttonComponent = 'super_admin.users.add-button';
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
            ->setDefaultSort('users.created_at', 'desc')
            ->setQueryStringStatus(false);
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
            Column::make(__('messages.hospital'), "first_name")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.columns.name'),
            Column::make(__('messages.user.hospital_slug'), "username")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.columns.user_name'),
            Column::make(__('messages.common.created_at'), "created_at")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.columns.created_on'),
            Column::make(__('messages.common.status'), "status")
                ->view('super_admin.users.columns.status'),
            Column::make(__('messages.impersonate'), "id")
                ->view('super_admin.users.columns.impersonate'),
            Column::make(__('messages.user.email_verified'), "email_verified_at")
                ->view('super_admin.users.columns.email_verified'),
            Column::make(__('messages.common.action'), "id")
                ->view('super_admin.users.columns.action'),
        ];
    }


    public function builder(): Builder
    {
        $query = User::with(['department', 'media'])->where('id', '!=', getLoggedInUserId())->select('users.*');
        
        if (getLoggedInUser()->hasRole('Super Admin')) {
            $query->where('department_id', '=', User::USER_ADMIN)->whereNotNull('hospital_name')->whereNotNull('username');
        }

        $query->when(isset($this->statusFilter), function (Builder $q) {
            if ($this->statusFilter == "") {
                $q;
            }
            if ($this->statusFilter == 1) {
                $q->where('status', User::ACTIVE);
            }
            if ($this->statusFilter == 0) {
                $q->where('status', User::INACTIVE);
            }
        });

        return $query;

    }
}
