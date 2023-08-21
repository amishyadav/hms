@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_category.radiology_categories') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:radiology-category-table/>
            {{ Form::hidden('radiologyCategoryCreateUrl', route('radiology.category.store'), ['id' => 'createRadiologyCategoryURL']) }}
            {{ Form::hidden('radiologyCategoryUrl', url('radiology-categories'), ['id' => 'radiologyCategoryURL']) }}
            {{ Form::hidden('radiologyCategoryLang',__('messages.delete.radiology_category'), ['id' => 'radiologyCategoryLang']) }}
            @include('radiology_categories.modal')
            @include('radiology_categories.edit_modal')
            @include('radiology_categories.templates.templates')
        </div>
    </div>
@endsection
{{--let radiologyCategoryCreateUrl = "{{ route('radiology.category.store') }}";--}}
{{--let radiologyCategoryUrl = "{{ url('radiology-categories') }}";--}}
{{--    <script src="{{ mix('assets/js/radiology_categories/radiology_categories.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
