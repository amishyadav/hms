@extends('layouts.app')
@section('title')
    {{ __('messages.prescriptions') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('prescriptionLang',__('messages.delete.prescription'), ['id' => 'prescriptionLang']) }}
            @include('flash::message')
            <livewire:patient-prescription-table/>
        </div>
        @include('patients_prescription_list.templates.templates')
    </div>
@endsection
{{--let prescriptionUrl = "{{url('patient/my-prescriptions')}}"--}}
{{--let patientUrl = "{{url('patients')}}"--}}
{{--    <script src="{{ mix('assets/js/patient_prescriptions/patient_prescriptions.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/patient_prescriptions/create-edit.js')}}"></script>--}}
