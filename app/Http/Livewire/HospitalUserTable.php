<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class HospitalUserTable extends LivewireTableComponent
{
    protected $model = User::class;
    public $showFilterOnHeader = true;
    public $paginationIsEnabled = true;
    public $FilterComponent = [
        'super_admin.users.hospital_users_columns.filter-button', User::FILTER_STATUS_ARR, Department::ROLE,
    ];
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'changeRoleFilter', 'resetPage'];
    public $hospitalId;
    public $hospitalTenantId;
    public $roleFilter = 0;

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
    public function changeRoleFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->roleFilter = $value;
        $this->setBuilder($this->builder());
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.users'), "first_name")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_users_columns.name'),
            Column::make(__('messages.employee_payroll.role'), "last_name")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_users_columns.role'),
            Column::make(__('messages.user.email'), "email")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_users_columns.email'),
            Column::make(__('messages.user.phone'), "phone")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_users_columns.phone'),
            Column::make(__('messages.common.status'), "status")
                ->view('super_admin.users.hospital_users_columns.status'),
            Column::make(__('messages.common.created_at'), "created_at")
                ->sortable()
                ->searchable()
                ->view('super_admin.users.hospital_users_columns.created_on'),
            Column::make(__('messages.impersonate'), "id")
                ->view('super_admin.users.hospital_users_columns.impersonate'),
        ];
    }

    public function builder(): Builder
    {
        /** @var User $query */
        $query = User::with(['roles', 'department', 'media'])->where('id', '!=', $this->hospitalId)->where('tenant_id',
            $this->hospitalTenantId)->select('users.*');

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

        $query->when(isset($this->roleFilter), function (Builder $q) {
            if ($this->roleFilter == 0) {
                $q;
            } else {
                $q->where('department_id', $this->roleFilter);
            }
        });


        return $query;
    }
}
