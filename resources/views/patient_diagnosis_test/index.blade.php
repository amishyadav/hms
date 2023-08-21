@extends('layouts.app')
@section('title')
    {{ __('messages.patient_diagnosis_test.patient_diagnosis_test') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:patient-diagnosis-test-table/>
            {{ Form::hidden('patientDiagnosisTestUrl', url('patient-diagnosis-test'), ['id' => 'patientDiagnosisTestUrl']) }}
            {{ Form::hidden('diagnosisCategoryUrl', url('diagnosis-categories'), ['id' => 'diagnosisCategoryUrl']) }}
            {{ Form::hidden('doctorUrl', (Auth::user()->hasRole('Lab Technician')) ? url('employee/doctor') : url('doctors'), ['id' => 'doctorUrl']) }}
            {{ Form::hidden('patientUrl', url('patients'), ['id' => 'patientUrl']) }}
            {{Form::hidden('patientDiagnosisTestUrl',url('patient-diagnosis-test'),['id'=>'indexPatientDiagnosisTestUrl','class'=>'patientDiagnosisTestUrl'])}}
            {{ Form::hidden('patientDiagnosisTestLang',__('messages.delete.patient_diagnosis_test'), ['id' => 'patientDiagnosisTestLang']) }}
            @include('accountants.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--let patientDiagnosisTestUrl = "{{url('patient-diagnosis-test')}}";--}}
{{--let diagnosisCategoryUrl = "{{ url('diagnosis-categories') }}";--}}
{{--let doctorUrl = "{{(Auth::user()->hasRole('Lab Technician')) ? url('employee/doctor') : url('doctors') }}";--}}
{{--let patientUrl = "{{ url('patients') }}";--}}
{{--let checkLabTechnicianRole = "{{(Auth::user()->hasRole('Lab Technician')) ? true : false}}";--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/patient_diagnosis_test/patient_diagnosis_test.js') }}"></script>--}}
