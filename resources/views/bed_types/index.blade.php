@extends('layouts.app')
@section('title')
    {{ __('messages.bed_type.bed_types') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column">
        @include('flash::message')
        <livewire:bed-type-table/>
        {{ Form::hidden('bedTypesCreateURL', route('bed-types.store'), ['id' => 'bedTypesCreateURL']) }}
        {{ Form::hidden('bedTypeIndexUrl', url('bed-types'), ['id' => 'bedTypeIndexUrl']) }}
        {{ Form::hidden('bedTypeLang', __('messages.delete.bed_type'), ['id' => 'bedTypeLang']) }}
        @include('bed_types.modal')
        @include('bed_types.edit_modal')
        @include('partials.modal.templates.templates')
    </div>
</div>

@endsection
{{--let bedTypesCreateUrl = "{{ route('bed-types.store') }}";--}}
{{--let bedTypesUrl = "{{ url('bed-types') }}";--}}
{{--    <script src="{{ mix('assets/js/bed_types/bed_types.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
