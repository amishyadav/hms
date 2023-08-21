@extends('layouts.app')
@section('title')
    {{ __('messages.advanced_payment.advanced_payments') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <livewire:advanced-payment-table/>
            @include('advanced_payments.create_modal')
            @include('advanced_payments.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
        {{ Form::hidden('advancedPaymentURL', url('advanced-payments'), ['class' => 'advancedPaymentURL']) }}
        {{ Form::hidden('advancePaymentCreateUrl', route('advanced-payments.store') , ['class' => 'advancePaymentCreateUrl']) }}
        {{ Form::hidden('advancedPaymentPatientURL', url('patients') , ['class' => 'advancedPaymentPatientURL']) }}
        {{ Form::hidden('advancePaymentLang', __('messages.delete.advanced_payment'), ['id' => 'advancePaymentLang']) }}
    </div>

@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--let advancedPaymentUrl = "{{url('advanced-payments')}}";--}}
{{--let advancePaymentCreateUrl = "{{ route('advanced-payments.store') }}";--}}
{{--let patientUrl = "{{ url('patients') }}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/advanced_payments/advanced_payments.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/advanced_payments/create-edit.js') }}"></script>--}}
