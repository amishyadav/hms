@extends('layouts.app')
@section('title')
    {{ __('messages.employee_payroll.edit_employee_payroll') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('employee-payrolls.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::hidden('employeeURL', route('employees.list'), ['class' => 'employeeURL']) }}
                    {{ Form::hidden('employeeOwnerId', $employeePayroll->owner_id, ['id' => 'employeeOwnerId']) }}
                    {{ Form::hidden('isEdit', false, ['class' => 'isEdit']) }}
                    {{ Form::model($employeePayroll, ['route' => ['employee-payrolls.update', $employeePayroll->id], 'method' => 'patch','id' => 'editEmployeePayroll']) }}
                    @include('employee_payrolls.edit_fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--let employeeUrl = "{{ route('employees.list') }}";--}}
{{--let employeeOwnerId = "{{ $employeePayroll->owner_id }}";--}}
{{--let isEdit = true;--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/employee_payrolls/edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/employee_payrolls/payrolls.js') }}"></script>--}}
