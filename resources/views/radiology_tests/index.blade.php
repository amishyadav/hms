@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_tests') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:radiology-test-table/>
            {{ Form::hidden('radiologyTestUrl', url('radiology-tests'), ['id' => 'radiologyTestURL']) }}
            {{ Form::hidden('radiologyTestLang',__('messages.delete.radiology_test'), ['id' => 'radiologyTestLang']) }}
            @include('partials.page.templates.templates')
            @include('radiology_tests.show_modal')
        </div>
    </div>
@endsection
{{--let radiologyTestUrl = "{{url('radiology-tests')}}";--}}
{{--    <script src="{{ mix('assets/js/radiology_tests/radiology_tests.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
