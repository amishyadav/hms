@extends('layouts.app')
@section('title')
    {{ __('messages.subscription_plans.transactions') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')

    <div class="container-fluid">
        <div class="d-flex flex-column">
            <livewire:subscribers-transaction-table/>
            @include('subscription_transactions.templates.templates')
            {{ Form::hidden('changePaymentStatusURL', url('change-payment-status'), ['id' => 'changePaymentStatusURL']) }}
        </div>
@endsection
{{--let subscriptionTransactionUrl = null--}}
{{--let hospitalUrl = "{{ url('super-admin/hospital') }}"--}}
{{--let isSuperAdminLogin = "{{ getLoggedInUser()->hasRole('Super Admin') }}"--}}
{{--let paid = "{{ \App\Models\Transaction::PAID }}"--}}
{{--let unpaid = "{{ \App\Models\Transaction::UNPAID }}"--}}
{{--let stripe = "{{ \App\Models\Subscription::PAYMENT_TYPES[1] }}"--}}
{{--let paypal = "{{ \App\Models\Subscription::PAYMENT_TYPES[2] }}";--}}
{{--let razorPay = "{{ \App\Models\Subscription::PAYMENT_TYPES[3] }}";--}}
{{--let cash = "{{ \App\Models\Subscription::PAYMENT_TYPES[4] }}";--}}
{{--let approved = "{{ __('messages.subscription.approved') }}"--}}
{{--let denied = "{{ __('messages.subscription.denied') }}"--}}
{{--let waitingForApproval = "{{ __('messages.subscription.waiting_for_approval') }}"--}}
{{--let selectManualPayment = "{{ __('messages.subscription.select_manual_payment') }}"--}}
{{--if (isSuperAdminLogin)--}}
{{--    subscriptionTransactionUrl = "{{ route('subscriptions.transactions.index') }}"--}}
{{--else--}}
{{--    subscriptionTransactionUrl = "{{ route('subscriptions.plans.transactions.index') }}"--}}
{{--    <script src="{{mix('assets/js/subscriptions/subscriptions-transactions.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
