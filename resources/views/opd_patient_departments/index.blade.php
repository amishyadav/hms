@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patients') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:opd-patient-table/>
            {{Form::hidden('opdPatientUrl',url('opds'),['id'=>'indexOpdPatientUrl'])}}
            {{Form::hidden('patientUrl',url('patients'),['id'=>'indexPatientOpdUrl'])}}
            {{Form::hidden('doctorUrl',url('doctors'),['id'=>'indexOpdDoctorUrl'])}}
            {{ Form::hidden('opdPatientLang',__('messages.delete.opd_patient'), ['id' => 'opdPatientLang']) }}
            @include('opd_patient_departments.templates.templates')
        </div>
@endsection
{{--let opdPatientUrl = "{{url('opds')}}"--}}
{{--let patientUrl = "{{url('patients')}}"--}}
{{--let doctorUrl = "{{url('doctors')}}"--}}
{{--    <script src="{{ mix('assets/js/opd_patients/opd_patients.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
