@extends('layouts.app')
@section('title')
    {{ __('messages.package.packages') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:package-table/>
            @include('partials.page.templates.templates')
            {{ Form::hidden('packageReportUrl', url('packages'), ['class' => 'packageReportUrl']) }}
            {{ Form::hidden('packageLang',__('messages.delete.package'), ['id' => 'packageLang']) }}
        </div>
    </div>
@endsection
{{--let packageReportUrl = "{{url('packages')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/packages/packages.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
