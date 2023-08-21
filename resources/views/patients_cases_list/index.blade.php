@extends('layouts.app')
@section('title')
    Patients Cases
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:case-table/>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let patientCasesUrl = "{{url('patient/my-cases')}}"--}}
{{--        let patientCaseShowUrl = "{{url('patient/my-cases')}}";--}}
{{--        let patientUrl = "{{url('patients')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/patient_cases_list/patient_cases_list.js')}}"></script>--}}


