@extends('layouts.app')
@section('title')
    {{ __('messages.nurses') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{ Form::hidden('nurseUrl', url('nurses'), ['id' => 'nurseURL']) }}
            {{ Form::hidden('nurseLang',__('messages.delete.nurse'), ['id' => 'nurseLang']) }}
            <livewire:nurse-table/>
            @include('nurses.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{mix('assets/js/nurses/nurses.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}

