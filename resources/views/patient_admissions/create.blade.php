@extends('layouts.app')
@section('title')
    {{ __('messages.patient_admission.new_patient_admission') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('patient-admissions.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
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
                {{Form::hidden('isEdit',false,['class'=>'isEdit'])}}
                {{Form::hidden('patientBirthUrl',route('patients.birthDate'),['id'=>'admissionPatientBirthUrl'])}}
                <div class="card-body p-12">
                    {{ Form::open(['route' => 'patient-admissions.store', 'id' => 'createPatientAdmission']) }}
                    @include('patient_admissions.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";--}}
{{--        let patientBirthUrl = "{{route('patients.birthDate')}}";--}}
{{--        let isEdit = false;--}}
{{--    <script src="{{ mix('assets/js/patient_admissions/create-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}
