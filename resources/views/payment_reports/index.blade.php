@extends('layouts.app')
@section('title')
    {{ __('messages.payment.payment_reports') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <livewire:payment-report-table/>
        </div>
    </div>
    {{ Form::hidden('paymentReportURL', url('payment-reports'), ['id' => 'paymentReportURL']) }}

@endsection
{{--        let paymentReportUrl = "{{ url('payment-reports') }}"--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/payment_reports/payments_reports.js')}}"></script>--}}

