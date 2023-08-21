@extends('layouts.app')
@section('title')
    {{ __('messages.diagnosis_category.diagnosis_categories') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column">
        @include('flash::message')
        <livewire:diagnosis-category-table/>
        {{ Form::hidden('diagnosisCategoryCreateUrl', route('diagnosis.category.store'), ['id' => 'diagnosisCategoryCreateUrl']) }}
        {{ Form::hidden('diagnosisCategoryUrl', url('diagnosis-categories'), ['class' => 'diagnosisCategoriesUrl']) }}
        {{ Form::hidden('diagnosisCategoryLang', __('messages.delete.diagnosis_category'), ['id' => 'diagnosisCategoryLang']) }}
        @include('diagnosis_categories.modal')
        @include('diagnosis_categories.edit_modal')
    </div>
</div>
@endsection
{{--let diagnosisCategoryCreateUrl = "{{ route('diagnosis.category.store') }}";--}}
{{--let diagnosisCategoryUrl = "{{ url('diagnosis-categories') }}";--}}
{{--    <script src="{{ mix('assets/js/diagnosis_category/diagnosis_category.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
