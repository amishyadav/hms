@extends('layouts.app')
@section('title')
    {{ __('messages.bed.beds') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column">
        @include('flash::message')
        <livewire:bed-table/>
        {{ Form::hidden('bedUrl', url('beds'), ['class' => 'bedUrl']) }}
        {{ Form::hidden('bedCreateUrl', route('beds.store'), ['id' => 'bedCreateUrl']) }}
        {{ Form::hidden('bedTypesUrl', url('bed-types'), ['id' => 'bedTypesUrl']) }}
        {{ Form::hidden('bedLang', __('messages.delete.bed'), ['id' => 'bedLang']) }}
        @include('beds.create_modal')
        @include('beds.edit_modal')
        @include('partials.modal.templates.templates')
    </div>
</div>
@endsection
{{--let bedUrl = "{{url('beds')}}";--}}
{{--let bedCreateUrl = "{{ route('beds.store') }}";--}}
{{--let bedTypesUrl = "{{url('bed-types')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/beds/beds.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/beds/create-edit.js') }}"></script>--}}
