@extends('layouts.app')
@section('title')
    {{ __('messages.medicine_categories') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{Form::hidden('categoryCreateUrl',route('categories.store'),['id'=>'indexCategoryCreateUrl'])}}
            {{Form::hidden('categoriesUrl',url('categories'),['id'=>'indexCategoriesUrl'])}}
            {{ Form::hidden('medicineCategoryLang', __('messages.delete.medicine_category'), ['id' => 'medicineCategoryLang']) }}
            <livewire:medicine-category-table/>
            @include('categories.modal')
            @include('categories.edit_modal')
            @include('categories.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--        let categoryCreateUrl = "{{ route('categories.store') }}";--}}
{{--        let categoriesUrl = "{{ url('categories') }}";--}}
{{--    <script src="{{ mix('assets/js/category/category.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
