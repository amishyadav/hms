@extends('layouts.app')
@section('title')
    {{ __('messages.services') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('serviceReportUrl',url('services'),['id'=>'showServiceReportUrl'])}}
            {{ Form::hidden('serviceLang',__('messages.delete.service'), ['id' => 'serviceLang']) }}
            <livewire:services-table/>
            @include('services.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--        let serviceReportUrl = "{{url('services')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/services/services.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
