@extends('layouts.app')
@section('title')
    {{ __('messages.pathology_tests') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{ Form::hidden('pathologyTestUrl', url('pathology-tests'), ['id' => 'pathologyTestURL']) }}
            {{ Form::hidden('pathology.test.show.modal', url('pathology-tests-show-modal'), ['id' => 'pathologyTestShowUrl']) }}
            {{ Form::hidden('pathologyTestLang',__('messages.delete.pathology_test'), ['id' => 'pathologyTestLang']) }}
            <livewire:pathology-test-table/>
            @include('partials.page.templates.templates')
            @include('pathology_tests.show_modal')
        </div>
    </div>
@endsection
{{--let pathologyTestUrl = "{{url('pathology-tests')}}";--}}
{{--    <script src="{{ mix('assets/js/pathology_tests/pathology_tests.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
