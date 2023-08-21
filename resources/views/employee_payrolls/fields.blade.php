<div class="row gx-10 mb-5">
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('sr_no', __('messages.employee_payroll.sr_no').':', ['class' => 'form-label required ']) }}
        {{ Form::text('sr_no', $srNo, ['class' => 'form-control ', 'required', 'tabindex' => '1']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        @php $currentLang = app()->getLocale() @endphp
        {{ Form::label('payroll_id',__('messages.employee_payroll.payroll_id').':', ['class' => $currentLang == 'ru' ? 'label-display form-label required ' : 'form-label required ']) }}
        {{ Form::text('payroll_id', $payrollId, ['class' => 'form-control ', 'required', 'tabindex' => '2','readonly']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('type',__('messages.employee_payroll.role').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::select('type', $types, null, ['id' => 'employeePayrollType','class' => 'form-select employeePayrollType','placeholder' => __('messages.sms.select_role'),'data-control' => 'select2']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('owner_id',__('messages.employee_payroll.employee').':', ['class' => 'form-label required ']) }}
        {{ Form::select('owner_id', [], null, ['id' => 'EmployeePayrollOwnerType','class' => 'form-select EmployeePayrollOwnerType','required','disabled','data-control' => 'select2', 'placeholder' => __('messages.employee_payroll.select_employee') ]) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('month',__('messages.employee_payroll.month').':', ['class' => 'form-label required ']) }}
        {{ Form::selectMonth('month',null, ['id' => 'EmployeePayrollMonth','class' => 'form-select EmployeePayrollMonth','required','data-control' => 'select2']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('year', __('messages.employee_payroll.year').(':'), ['class' => 'form-label required ']) }}
        {{ Form::text('year', null, ['class' => 'form-control ','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'maxlength' => '4','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'form-label required ']) }}
        {{ Form::select('status', filterLangChange($status), null, ['id' => 'createEmployeePayrollStatus','class' => 'form-select EmployeePayrollStatus','required','data-control' => 'select2']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('basic_salary', __('messages.employee_payroll.basic_salary').(':'), ['class' => 'form-label required ']) }}
        {{ Form::text('basic_salary', null, ['id' => 'createEmployeePayrollBasicSalary','class' => 'form-control price-input EmployeePayrollBasicSalary','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '7','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('allowance', __('messages.employee_payroll.allowance').(':'), ['class' => 'form-label required ']) }}
        {{ Form::text('allowance', null, ['id' => 'createEmployeePayrollAllowance','class' => 'form-control price-input EmployeePayrollAllowance','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '5','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('deductions', __('messages.employee_payroll.deductions').(':'), ['class' => 'form-label required ']) }}
        {{ Form::text('deductions', null, ['id' => 'createEmployeePayrollDeductions','class' => 'form-control price-input EmployeePayrollDeductions','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '5','required']) }}
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12 mb-5">
        {{ Form::label('net_salary', __('messages.employee_payroll.net_salary').(':'),['class' => 'form-label required ']) }}
        {{ Form::text('net_salary', 0, ['id' => 'employeePayrollNetSalary','class' => 'form-control price-input employeePayrollNetSalary','onkeyup' => 'if (/\D\./g.test(this.value)) this.value = this.value.replace(/\D\./g,"")', 'maxlength' => '7','required','readonly']) }}
    </div>
</div>
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3 btnSave','id' => 'employeePayrollBtnSave']) }}
    <a href="{{ route('employee-payrolls.index') }}"
       class="btn btn-secondary me-2">{{ __('messages.common.cancel') }}</a>
</div>
