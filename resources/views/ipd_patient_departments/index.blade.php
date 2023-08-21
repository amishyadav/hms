@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.ipd_patients') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('ipdPatientUrl',url('ipds'),['id'=>'indexIpdPatientUrl'])}}
            {{Form::hidden('patientUrl',url('patients'),['id'=>'indexIpdDepartmentPatientUrl'])}}
            {{Form::hidden('doctorUrl',url('doctors'),['id'=>'indexIpdDepartmentDoctorUrl'])}}
            {{Form::hidden('bedUrl',url('beds'),['id'=>'indexIpdDepartmentBedUrl'])}}
            {{ Form::hidden('ipdPatientLang', __('messages.delete.ipd_patient'), ['id' => 'ipdPatientLang']) }}
            <livewire:ipd-patient-department-table/>
        </div>
        @include('ipd_patient_departments.templates.templates')
    </div>
@endsection
{{--        let ipdPatientUrl = "{{url('ipds')}}"--}}
{{--        let patientUrl = "{{url('patients')}}"--}}
{{--        let doctorUrl = "{{url('doctors')}}"--}}
{{--        let bedUrl = "{{url('beds')}}"--}}
{{--    <script src="{{ mix('assets/js/ipd_patients/ipd_patients.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
