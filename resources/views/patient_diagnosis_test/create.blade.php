@extends('layouts.app')
@section('title')
    {{ __('messages.patient_diagnosis_test.new_patient_diagnosis_test') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('patient.diagnosis.test.index') }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
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
                <div class="card-body">
                    {{Form::hidden('patientDiagnosisTestSaveUrl',route('patient.diagnosis.test.store'),['id'=>'createPatientDiagnosisTestSaveUrl','class'=>'patientDiagnosisTestSaveUrl'])}}
                    {{Form::hidden('patientDiagnosisTest',route('patient.diagnosis.test.index'),['id'=>'createPatientDiagnosisTest','class'=>'patientDiagnosisTest'])}}
                    {{Form::hidden('uniqueId',2,['class'=>'uniqueId'])}}
                    {{ Form::open(['route' => 'patient.diagnosis.test.store', 'id'=>'patientDiagnosisTestForm', 'class' => 'patientDiagnosisTestForm']) }}
                    @include('patient_diagnosis_test.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @include('patient_diagnosis_test.templates.templates')
    </div>
@endsection
{{--let patientDiagnosisTestSaveUrl = "{{route('patient.diagnosis.test.store')}}";--}}
{{--let patientDiagnosisTest = "{{route('patient.diagnosis.test.index')}}";--}}
{{--let uniqueId = 2;--}}
{{--    <script src="{{ mix('assets/js/patient_diagnosis_test/create-edit.js') }}"></script>--}}
