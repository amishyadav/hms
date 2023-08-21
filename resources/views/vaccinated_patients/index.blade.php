@extends('layouts.app')
@section('title')
    {{ __('messages.vaccinated_patients') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:vaccinated-patient-table/>
            {{Form::hidden('vaccinated_patients_store',route('vaccinated-patients.store'),['id'=>'vaccinatedPatientsStore'])}}
            {{Form::hidden('vaccinated_patients_index',route('vaccinated-patients.index'),['id'=>'vaccinatedPatientsIndex'])}}
            {{ Form::hidden('vaccinationPatientLang',__('messages.delete.vaccinated_patient'), ['id' => 'vaccinationPatientLang']) }}

            @include('vaccinated_patients.add_modal')
            @include('vaccinated_patients.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let vaccinatedPatientCreateUrl = "{{ route('vaccinated-patients.store') }}"--}}
{{--let vaccinatedPatientUrl = "{{ route('vaccinated-patients.index') }}"--}}
{{--let patientUrl = "{{ url('patients') }}"--}}
{{--    <script src="{{ mix('assets/js/vaccinated_patients/vaccinated_patients.js') }}"></script>--}}
