@extends('layouts.app')
@section('title')
    {{ __('messages.case_handlers') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('caseHandlerUrl',url('case-handlers'),['id'=>'indexCaseHandlerUrl'])}}
            {{ Form::hidden('caseHandlerLang', __('messages.delete.case_handler'), ['id' => 'caseHandlerLang']) }}
            <livewire:case-handler-table/>
            @include('case_handlers.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{mix('assets/js/case_handlers/case_handlers.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
