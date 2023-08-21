@extends('layouts.app')
@section('title')
    {{ __('messages.item_category.item_categories') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{Form::hidden('itemCategoryCreateUrl',route('item-categories.store'),['id'=>'indexItemCategoryCreateUrl'])}}
            {{Form::hidden('itemCategoriesUrl',url('item-categories'),['id'=>'indexItemCategoriesUrl'])}}
            {{ Form::hidden('itemCategoryLang', __('messages.delete.item_category'), ['id' => 'itemCategoryLang']) }}
            <livewire:item-categories-table/>
            @include('item_categories.modal')
            @include('item_categories.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
    </div>
@endsection
{{--        let itemCategoryCreateUrl = "{{ route('item-categories.store') }}";--}}
{{--        let itemCategoriesUrl = "{{ url('item-categories') }}";--}}
{{--    <script src="{{ mix('assets/js/item_categories/item_categories.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
