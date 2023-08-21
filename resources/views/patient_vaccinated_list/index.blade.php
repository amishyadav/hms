@extends('layouts.app')
@section('title')
    {{ __('messages.vaccinated_patients') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:vaccinated-patient-table/>
        </div>
    </div>
@endsection
{{--let patientVaccinatedUrl = "{{ route('patient.vaccinated') }}"--}}
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/vaccinated_patients/patient_vaccinated.js') }}"></script>--}}
