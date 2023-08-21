@extends('layouts.app')
@section('title')
    {{ __('messages.charges') }}
@endsection
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('chargeCategoryUrl', url('charge-categories'), ['id' => 'chargesCategoryURl']) }}
            {{ Form::hidden('chargeUrl', url('charges'), ['class' => 'chargesURl']) }}
            {{ Form::hidden('chargeCreateUrl', route('charges.store'), ['id' => 'createChargesURL']) }}
            {{ Form::hidden('changeChargeTypeUrl', url('get-charge-categories'), ['class' => 'changeChargeTypeURL']) }}
            {{ Form::hidden('chargeLang', __('messages.delete.charge'), ['id' => 'chargeLang']) }}
            <livewire:charge-table/>
            @include('charges.templates.templates')
            @include('charges.create_modal')
            @include('charges.edit_modal')
        </div>
    </div>
@endsection
{{--        let chargeCategoryUrl = "{{ url('charge-categories') }}";--}}
{{--        let chargeUrl = "{{ url('charges') }}";--}}
{{--        let chargeCreateUrl = "{{ route('charges.store') }}";--}}
{{--        let changeChargeTypeUrl = "{{ url('get-charge-categories') }}";--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/charges/charges.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/charges/create-edit.js') }}"></script>--}}

