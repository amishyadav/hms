@extends('layouts.app')
@section('title')
    {{ __('messages.payment.payments') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:payment-table/>
        </div>
        @include('payments.templates.templates')
        @include('payments.show_modal')
        {{ Form::hidden('paymentURL', url('payments'), ['id' => 'paymentURL']) }}
        {{ Form::hidden('paymentShowURL', url('payments-show-modal'), ['id' => 'paymentShowURL']) }}
        {{ Form::hidden('paymentLang',__('messages.delete.payment'), ['id' => 'paymentLang']) }}
    </div>
@endsection
{{--        let paymentUrl = "{{ url('payments') }}";--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/payments/payments.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}

