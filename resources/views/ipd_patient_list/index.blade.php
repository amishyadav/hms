@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.ipd_patients') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:ipd-patient-table/>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let ipdPatientUrl = "{{url('patient/my-ipds')}}";--}}
{{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_patients.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
