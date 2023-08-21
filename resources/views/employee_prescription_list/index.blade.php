@extends('layouts.app')
@section('title')
    {{ __('messages.prescriptions') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:employee-prescription-table/>
        </div>
        @include('employee_prescription_list.templates.templates')
    </div>
@endsection
{{--let prescriptionUrl = "{{url('employee/prescriptions')}}"--}}
{{--let employeeUrl = "{{url('employee')}}"--}}
{{--    <script src="{{ mix('assets/js/employee_prescriptions/employee_prescriptions.js') }}"></script>--}}
