<div class="row gx-10 mb-5">
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('sr_no', __('messages.employee_payroll.sr_no').':', ['class' => 'form-label required']) }}
        {{ Form::text('sr_no', null, ['class' => 'form-control ', 'required','readonly']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        @php $currentLang = app()->getLocale() @endphp
        {{ Form::label('payroll_id',__('messages.employee_payroll.payroll_id').':', ['class' => $currentLang == 'ru' ? 'label-display form-label required' : 'form-label required']) }}
        {{ Form::text('payroll_id', null, ['class' => 'form-control ', 'required','readonly']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('type',__('messages.employee_payroll.role').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('type', $types, $employeePayroll->type, ['id' => 'editEmployeePayrollType','class' => 'form-select employeePayrollType', 'required','placeholder' => __('messages.sms.select_role'),'data-control' => 'select2']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('owner_id',__('messages.employee_payroll.employee').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('owner_id', [], $employeePayroll->owner->id, ['id' => 'editEmployeePayrollOwnerType','class' => 'form-select EmployeePayrollOwnerType','required','disabled','data-control' => 'select2', 'placeholder' => __('messages.employee_payroll.select_employee') ]) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('month',__('messages.employee_payroll.month').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::selectMonth('month',$employeePayroll->month, ['id' => 'editEmployeePayrollMonth','class' => 'form-select EmployeePayrollMonth','required','data-control' => 'select2']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('year', __('messages.employee_payroll.year').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('year', null, ['class' => 'form-control ','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '4','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::select('status', filterLangChange($status), null, ['id' => 'editEmployeePayrollStatus','class' => 'form-select EmployeePayrollStatus','required', 'data-control' => 'select2']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('basic_salary', __('messages.employee_payroll.basic_salary').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('basic_salary', null, ['id' => 'editEmployeePayrollBasicSalary','class' => 'form-control price-input EmployeePayrollBasicSalary','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '7','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('allowance', __('messages.employee_payroll.allowance').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('allowance', null, ['id' => 'editEmployeePayrollAllowance','class' => 'form-control price-input EmployeePayrollAllowance','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '5','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('deductions', __('messages.employee_payroll.deductions').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('deductions', null, ['id' => 'editEmployeePayrollDeductions','class' => 'form-control price-input EmployeePayrollDeductions','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '5','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('net_salary', __('messages.employee_payroll.net_salary').(':'),['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
        {{ Form::text('net_salary', null, ['id' => 'editEmployeePayrollNetSalary','class' => 'form-control price-input employeePayrollNetSalary','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '7','required','readonly']) }}
    </div>
</div>
<div class="justify-content-end d-flex">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3 btnSave','id' => 'editEmployeePayrollBtnSave']) }}
    <a href="{{ route('employee-payrolls.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
