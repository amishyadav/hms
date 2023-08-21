@extends('layouts.app')
@section('title')
    {{ __('messages.pathology_category.pathology_categories') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('pathologyCategoryCreateUrl', route('pathology.category.store'), ['id' => 'createPathologyCategoryURL']) }}
            {{ Form::hidden('pathologyCategoryUrl', url('pathology-categories'), ['id' => 'pathologyCategoryURL']) }}
            {{ Form::hidden('pathologyCategoryLang',__('messages.delete.pathology_category'), ['id' => 'pathologyCategoryLang']) }}
            <livewire:pathology-category-table/>
            @include('pathology_categories.modal')
            @include('pathology_categories.edit_modal')
            @include('pathology_categories.templates.templates')
        </div>
    </div>
@endsection
{{--let pathologyCategoryCreateUrl = "{{ route('pathology.category.store') }}";--}}
{{--let pathologyCategoryUrl = "{{ url('pathology-categories') }}";--}}
{{--    <script src="{{ mix('assets/js/pathology_categories/pathology_categories.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
