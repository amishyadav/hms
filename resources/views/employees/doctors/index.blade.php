@extends('layouts.app')
@section('title')
    {{ __('messages.doctors') }}
@endsection
@section('page_css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:doctor-table/>
        </div>
@endsection
{{--let doctorUrl = "{{url('employee/doctor')}}"--}}
{{--let doctorShowUrl = "{{url('employee/doctor')}}"--}}
{{--    <script src="{{ mix('assets/js/employee/doctors.js') }}"></script>--}}
