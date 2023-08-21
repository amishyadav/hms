@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patients') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:opd-patient-department-table/>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let opdPatientUrl = "{{url('patient/my-opds')}}"--}}
{{--    <script src="{{ mix('assets/js/opd_patients_list/opd_patients.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
