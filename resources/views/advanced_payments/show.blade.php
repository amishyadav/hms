@extends('layouts.app')
@section('title')
    {{ __('messages.advanced_payment.advanced_payment_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.advanced_payment.advanced_payment_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary advanced-payment-edit-btn"
                   data-id="{{ $advancedPayment->id }}">{{ __('messages.common.edit') }}</a>
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
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            @include('advanced_payments.show_fields')
        </div>
        @include('advanced_payments.edit_modal')
        {{ Form::hidden('advancedPaymentURL', url('advanced-payments'), ['class' => 'advancedPaymentURL']) }}
        {{ Form::hidden('advancePaymentCreateUrl', route('advanced-payments.store') , ['class' => 'advancePaymentCreateUrl']) }}
        {{ Form::hidden('advancedPaymentPatientURL', url('patients') , ['class' => 'advancedPaymentPatientURL']) }}
    </div>
@endsection
{{--let advancedPaymentUrl = "{{url('advanced-payments')}}";--}}
{{--let advancePaymentCreateUrl = "{{ route('advanced-payments.store') }}";--}}
{{--let patientUrl = "{{ url('patients') }}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/advanced_payments/create-edit.js') }}"></script>--}}
