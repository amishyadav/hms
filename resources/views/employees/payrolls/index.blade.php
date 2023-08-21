@extends('layouts.app')
@section('title')
    {{ __('messages.my_payroll.my_payrolls') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:payroll-table/>
        </div>
    </div>
@endsection
{{--let employeePayrollUrl = "{{url('employee/payroll')}}";--}}
{{--let payrollUrl = "{{url('employee-payrolls')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/employee/my_payrolls.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
