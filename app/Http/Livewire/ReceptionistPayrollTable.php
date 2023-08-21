<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\EmployeePayroll;

class ReceptionistPayrollTable extends LivewireTableComponent
{
    protected $model = EmployeePayroll::class;

    public $receptionist;
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setThAttributes(function (Column $column) {

            if ($column->isField('basic_salary') || $column->isField('allowance') || $column->isField('deductions') || $column->isField('net_salary') ) {
                return [
                    'class' => 'text-end',
                ];
            }

            return [];
        });
    }
    
    public function mount(int $receptionistId) {
        $this->receptionist = $receptionistId;
    }
    
    public function columns(): array
    {
        return [
            Column::make( __('messages.employee_payroll.payroll_id') , "payroll_id")
                ->view('receptionists.columns.detail.payroll_id')
                ->searchable(),
            Column::make(__('messages.employee_payroll.month'), "month")
                ->view('receptionists.columns.detail.month')
                ->searchable(),
            Column::make(__('messages.employee_payroll.year'), "year")
                ->view('receptionists.columns.detail.year')
                ->searchable(),
            Column::make(__('messages.employee_payroll.basic_salary'), "basic_salary")
                ->view('receptionists.columns.detail.basic_salary')
                ->searchable(),
            Column::make(__('messages.employee_payroll.allowance'), "allowance")
                ->view('receptionists.columns.detail.allowance')
                ->searchable(),
            Column::make(__('messages.employee_payroll.deductions'), "deductions")
                ->view('receptionists.columns.detail.deduction')
                ->searchable(),
            Column::make(__('messages.employee_payroll.net_salary'), "net_salary")
                ->view('receptionists.columns.detail.net_salary')
                ->searchable(),
            Column::make(__('messages.common.status'), "status")
                ->view('receptionists.columns.detail.status')
                ->searchable(),
        ];
    }
    
    public function builder(): Builder
    {
        return EmployeePayroll::with('owner')->where('type', '=', '4')->where('owner_id', $this->receptionist);
    }
}
