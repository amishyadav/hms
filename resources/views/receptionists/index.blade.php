@extends('layouts.app')
@section('title')
    {{__('messages.receptionist.receptionists')}}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{ Form::hidden('receptionistUrl', url('receptionists'), ['id' => 'receptionistUrl']) }}
            {{ Form::hidden('receptionistLang',__('messages.delete.receptionist'), ['id' => 'receptionistLang']) }}
            <livewire:receptionist-table/>
            @include('receptionists.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/receptionists/receptionists.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
