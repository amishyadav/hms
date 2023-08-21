@extends('layouts.app')
@section('title')
    {{ __('messages.patients') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('patientUrl',url('patients'),['id'=>'indexPatientUrl'])}}
            {{Form::hidden('userUrl',route('users.index'),['id'=>'userUrl'])}}
            {{ Form::hidden('patientLang',__('messages.delete.patient'), ['id' => 'patientLang']) }}
            <livewire:patient-table/>
            @include('patients.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--        let patientUrl = "{{url('patients')}}"--}}
{{--        let userUrl = "{{route('users.index')}}"--}}
{{--    <script src="{{ mix('assets/js/patients/patients.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
