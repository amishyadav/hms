@extends('layouts.app')
@section('title')
    {{ __('messages.patient_diagnosis_test.patient_diagnosis_test')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0"> {{__('messages.patient_diagnosis_test.patient_diagnosis_test_details')}} </h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{route('patient.diagnosis.test.pdf',['patientDiagnosisTest' => $patientDiagnosisTest->id])}}"
                   target="_blank"
                   class="btn btn-success me-2">{{ __('messages.patient_diagnosis_test.print_diagnosis_test') }}
                </a>
                <a class="btn btn-primary"
                   href="{{route('patient.diagnosis.test.edit',['patientDiagnosisTest' => $patientDiagnosisTest->id])}}">
                    {{ __('messages.common.edit') }}
           </a>
           <a href="{{ url('patient-diagnosis-test')}}"
                    class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
                @include('patient_diagnosis_test.show_fields')
        </div>
    </div>
@endsection
