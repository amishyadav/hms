<?php

namespace App\Http\Livewire;

use App\Models\EmployeePayroll;
use App\Models\Nurse;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class NursePayrollTable extends LivewireTableComponent
{
    public $nurseId;
    protected $model = EmployeePayroll::class;
    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function mount(string $nurseId): void
    {
        $this->nurseId = $nurseId;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('employee_payrolls.created_at', 'desc')
            ->setQueryStringStatus(false);

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('basic_salary')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('allowance')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('deductions')) {
                return [
                    'class' => 'price-column',
                ];
            }
            if ($column->isField('net_salary')) {
                return [
                    'class' => 'price-column',
                ];
            }

            return [];
        });
    }


    public function columns(): array
    {
        return [
            Column::make("id", "id")
                ->hideIf('id'),
            Column::make(__('messages.employee_payroll.payroll_id'), "payroll_id")
                ->searchable()
                ->view('nurses.columns.nurse-payroll.payroll_id')
                ->sortable(),
            Column::make(__('messages.employee_payroll.month'), "month")
                ->searchable()
                ->sortable(),
            Column::make(__('messages.employee_payroll.year'), "year")
                ->searchable()
                ->sortable(),
            Column::make(__('messages.employee_payroll.basic_salary'), "basic_salary")
                ->searchable()
                ->view('nurses.columns.nurse-payroll.basic_salary')
                ->sortable(),
            Column::make(__('messages.employee_payroll.allowance'), "allowance")
                ->view('nurses.columns.nurse-payroll.allowance')
                ->sortable(),
            Column::make(__('messages.employee_payroll.deductions'), "deductions")
                ->view('nurses.columns.nurse-payroll.deductions')
                ->sortable(),
            Column::make(__('messages.employee_payroll.net_salary'), "net_salary")
                ->view('nurses.columns.nurse-payroll.net_salary')
                ->sortable(),
            Column::make(__('messages.common.status'), "status")
                ->view('nurses.columns.nurse-payroll.status')
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        /** @var EmployeePayroll $query */
//        $query = EmployeePayroll::where('owner_id', $this->nurseId)
//            ->where('owner_type', 'App\Models\Nurse');

        $query = EmployeePayroll::whereHasMorph(
            'owner', [
            Nurse::class,
        ], function ($q, $type) {
            if (in_array($type, EmployeePayroll::PYAYROLLUSERS)) {
                $q->whereHas('user', function (\Illuminate\Database\Eloquent\Builder $qr) {
                    return $qr;
                });
            }
        })->where('owner_id', $this->nurseId)->with('owner.user')->select('employee_payrolls.*');

        return $query;
    }
}
