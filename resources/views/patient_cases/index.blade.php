@extends('layouts.app')
@section('title')
    {{ __('messages.cases') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('casesUrl',url('patient-cases'),['id'=>'indexPatientCaseUrl'])}}
            {{Form::hidden('doctorUrl',url('doctors'),['id'=>'indexPatientCaseDoctorUrl'])}}
            {{Form::hidden('patientUrl',url('patients'),['id'=>'indexCasePatientUrl'])}}
            {{Form::hidden('userRole',Auth::user()->hasRole('Case Manager'),['id'=>'indexPatientCaseUserRole'])}}
            {{ Form::hidden('patient_case.show.modal', url('patient-cases-show-modal'), ['id' => 'patientCaseShowModal'])}}
            {{Form::hidden('currentCurrency', getCurrencySymbol(), ['id' => 'currentCurrency'])}}
            {{ Form::hidden('patientCaseLang',__('messages.delete.case'), ['id' => 'patientCaseLang']) }}

            <livewire:case-table/>
            @include('partials.page.templates.templates')
            @include('patient_cases.show_modal')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/patient_cases/patient_cases.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
