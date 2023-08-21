@extends('layouts.app')
@section('title')
    {{ __('messages.employee_payroll.employee_payrolls') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
<div class="container-fluid">
    @include('flash::message')
    <div class="d-flex flex-column">
        <livewire:employee-payroll-table/>
        @include('partials.page.templates.templates')
        @include('employee_payrolls.show_modal')
        {{ Form::hidden('employeePayrollURL', url('employee-payrolls'), ['id' => 'employeePayrollURL']) }}
        {{ Form::hidden('employeePayrollShowModal', url('employee-payrolls-show'), ['id' => 'employeePayrollShowModal']) }}
        {{ Form::hidden('editMessage', __('messages.common.edit'), ['id' => 'editMessage']) }}
        {{ Form::hidden('deleteMessage', __('messages.common.delete'), ['id' => 'deleteMessage']) }}
        {{ Form::hidden('employeePayrollLang', __('messages.delete.employee_payroll'), ['id' => 'employeePayrollLang']) }}
    </div>
</div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--let employeePayrollUrl = "{{url('employee-payrolls')}}";--}}
{{--let editMessage = "{{ __('messages.common.edit') }}";--}}
{{--let deleteMessage = "{{ __('messages.common.delete') }}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/employee_payrolls/employee_payrolls.js') }}"></script>--}}
