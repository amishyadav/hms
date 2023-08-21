@extends('layouts.app')
@section('title')
    {{ __('messages.charge_category.charge_categories') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('chargeCategoryUrl', url('charge-categories'), ['class' => 'chargeCategoryURLID' , 'id' => 'chargeCategoryURLID']) }}
            {{ Form::hidden('chargeCategoryCreateUrl', route('charge-categories.store'), ['class' => 'chargeCategoryCreateURLID']) }}
            {{ Form::hidden('chargeCategoryLang', __('messages.delete.charge_category'), ['id' => 'chargeCategoryLang']) }}
            <livewire:charge-category-table/>
            @include('charge_categories.templates.templates')
            @include('charge_categories.create_modal')
            @include('charge_categories.edit_modal')
        </div>
    </div>
@endsection
{{--        let chargeCategoryUrl = "{{ url('charge-categories') }}";--}}
{{--        let chargeCategoryCreateUrl = "{{ route('charge-categories.store') }}";--}}
{{--    <script src="{{mix('assets/js/charge_categories/charge_categories.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/charge_categories/create-edit.js') }}"></script>--}}

