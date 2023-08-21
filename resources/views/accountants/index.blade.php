@extends('layouts.app')
@section('title')
    {{__('messages.accountant.accountants')}}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{ Form::hidden('accountantUrl', url('accountants'), ['id' => 'accountantURL']) }}
            {{ Form::hidden('accountant', __('messages.delete.accountant'), ['id' => 'Accountant']) }}
            <livewire:accountant-table/>
            @include('accountants.templates.templates')
            @include('partials.page.templates.templates')
            {{ Form::hidden('accountantIndexURL', url('accountants'), ['id' => 'accountantIndexURL']) }}
        </div>
    </div>
@endsection
{{--        let accountantUrl = "{{url('accountants')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/accountants/accountants.js') }}"></script>--}}
