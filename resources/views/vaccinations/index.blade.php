@extends('layouts.app')
@section('title')
    {{ __('messages.vaccinations') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:vaccination-table/>
            {{Form::hidden('vaccinationCreateUrl',route('vaccinations.store'),['id'=>'vaccinationCreateUrl'])}}
            {{Form::hidden('vaccinationUrl',route('vaccinations.index'),['id'=>'vaccinationUrl'])}}
            {{ Form::hidden('vaccinationLang',__('messages.delete.vaccination'), ['id' => 'vaccinationLang']) }}

            @include('vaccinations.add_modal')
            @include('vaccinations.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--        let vaccinationCreateUrl = "{{ route('vaccinations.store') }}"--}}
{{--        let vaccinationUrl = "{{ route('vaccinations.index') }}"--}}
{{--    <script src="{{ mix('assets/js/vaccinations/vaccinations.js') }}"></script>--}}
