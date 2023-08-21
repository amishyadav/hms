@extends('layouts.app')
@section('title')
    {{ __('messages.pharmacist.pharmacists') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('pharmacistUrl',url('pharmacists'),['id'=>'indexPharmacistUrl'])}}
            {{ Form::hidden('pharmacistLang',__('messages.delete.pharmacist'), ['id' => 'pharmacistLang']) }}
            <livewire:pharmacist-table/>
            @include('pharmacists.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/pharmacists/pharmacists.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
