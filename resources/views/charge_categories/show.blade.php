@extends('layouts.app')
@section('title')
    {{ __('messages.charge_category.charge_category_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.charge_category.charge_category_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary edit-btn me-2" data-id="{{ $chargeCategory->id }}">
                    {{ __('messages.common.edit') }}
                </a>
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                {{ Form::hidden('chargeCategoryUrl', url('charge-categories'), ['class' => 'chargeCategoryURLID']) }}
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            @include('charge_categories.show_fields')
        </div>
        @include('charge_categories.edit_modal')
    </div>
@endsection
{{--        let chargeCategoryUrl = "{{ url('charge-categories') }}";--}}
{{--    <script src="{{ mix('assets/js/charge_categories/create-details-edit.js') }}"></script>--}}
