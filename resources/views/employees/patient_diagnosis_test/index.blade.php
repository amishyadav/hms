@extends('layouts.app')
@section('title')
    {{ __('messages.patient_diagnosis_test.patient_diagnosis_test') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:patient-diagnosis-test-table/>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let patientDiagnosisTestUrl = "{{url('employee/patient-diagnosis-test')}}"--}}
{{--let doctorUrl = "{{ url('doctors') }}";--}}
{{--let patientUrl = "{{ url('patients') }}";--}}
{{--    <script src="{{ mix('assets/js/employee/patient_diagnosis_test.js') }}"></script>--}}
