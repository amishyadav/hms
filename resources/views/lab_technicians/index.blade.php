@extends('layouts.app')
@section('title')
    {{ __('messages.lab_technicians') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            {{ Form::hidden('labTechnicianUrl', url('lab-technicians'), ['id' => 'labTechnicianURL']) }}
            {{ Form::hidden('labTechnicianLang',__('messages.delete.lab_technician'), ['id' => 'labTechnicianLang']) }}
            <livewire:lab-technician-table/>
            @include('lab_technicians.templates.templates')
        </div>
    </div>
@endsection
{{--        let labTechnicianUrl = "{{url('lab-technicians')}}";--}}
{{--    <script src="{{ mix('assets/js/lab_technicians/lab_technicians.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
