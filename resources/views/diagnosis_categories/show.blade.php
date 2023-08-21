@extends('layouts.app')
@section('title')
    {{ __('messages.diagnosis_category.diagnosis_category')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.charge.charge_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary diagnosis-category-edit-btn me-2"
                   data-id="{{ $diagnosisCategory->id }}">{{ __('messages.common.edit') }}</a>
                <a href="javascript:history.back(-1);"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            @include('diagnosis_categories.show_fields')
            {{ Form::hidden('diagnosisCategoryUrl', url('diagnosis-categories'), ['class' => 'diagnosisCategoriesUrl']) }}
            {{ Form::hidden('diagnosisCategoryShowUrl', Request::fullUrl(),   ['id' => 'diagnosisCategoriesShowUrl']) }}
        </div>
    </div>
    @include('diagnosis_categories.edit_modal')
@endsection
{{--        let diagnosisCategoryUrl = "{{ url('diagnosis-categories') }}";--}}
{{--    <script src="{{ mix('assets/js/diagnosis_category/diagnosis_category-details-edit.js') }}"></script>--}}
