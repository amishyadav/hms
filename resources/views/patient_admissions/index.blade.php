@extends('layouts.app')
@section('title')
    {{ __('messages.patient_admissions') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('patientAdmissionsUrl',url('patient-admissions'),['id'=>'indexPatientAdmissionsUrl'])}}
            {{Form::hidden('patientUrl',url('patients'),['id'=>'admissionPatientUrl'])}}
            {{Form::hidden('doctorUrl',url('doctors'),['id'=>'admissionDoctorUrl'])}}
            {{Form::hidden('packageUrl',url('packages'),['id'=>'admissionPackageUrl'])}}
            {{Form::hidden('insuranceUrl',url('insurances'),['id'=>'admissionInsuranceUrl'])}}
            {{Form::hidden('userRole', Auth()->user()->hasRole('Case Manager')?true:false ,['id'=>'admissionUserRole'])}}
            {{ Form::hidden('patient-admissions.show.modal', url('patient-admissions-show'), ['id' => 'patientAdmissionsShowModal']) }}
            {{ Form::hidden('patientAdmissionLang',__('messages.delete.patient_admission'), ['id' => 'patientAdmissionLang']) }}
            <livewire:patient-admission-table/>
            @include('partials.page.templates.templates')
            @include('patient_admissions.show_modal')
        </div>
    </div>
@endsection
{{--        let patientAdmissionsUrl = "{{url('patient-admissions')}}"--}}
{{--        let patientUrl = "{{url('patients')}}"--}}
{{--        let doctorUrl = "{{url('doctors')}}"--}}
{{--        let packageUrl = "{{url('packages')}}"--}}
{{--        let insuranceUrl = "{{url('insurances')}}"--}}
{{--        let userRole = "{{Auth::user()->hasRole('Case Manager')?true:false}}"--}}
{{--    <script src="{{ mix('assets/js/patient_admissions/patient_admission.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
