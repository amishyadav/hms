@extends('layouts.app')
@section('title')
    {{ __('messages.patient_admissions') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:patient-admission-table/>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let patientAdmissionsUrl = "{{url('employee/patient-admissions')}}"--}}
{{--let patientUrl = "{{url('patients')}}";--}}
{{--let packageUrl = "{{url('packages')}}";--}}
{{--let insuranceUrl = "{{url('insurances')}}";--}}
{{--    <script src="{{ mix('assets/js/employee/patient_admission.js') }}"></script>--}}
