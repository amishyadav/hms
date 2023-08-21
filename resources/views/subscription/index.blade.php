@extends('layouts.app')
@section('title')
    {{ __('messages.subscription.subscriptions') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:admin-subscription-table/>
        </div>
        {{ Form::hidden('hospitalUrl', route('subscriptions.list.index'), ['id' => 'subscriptionHospitalURL']) }}
        {{ Form::hidden('isSuperAdminLogin', getLoggedInUser()->hasRole('Super Admin'), ['id' => 'subscriptionSuperAdminLogin']) }}
        {{ Form::hidden('active', getLoggedInUser()->hasRole('Super Admin'), ['id' => 'activeSubscription']) }}
        {{ Form::hidden('inactive', getLoggedInUser()->hasRole('Super Admin'), ['id' => 'inactiveSubscription']) }}
        {{ Form::hidden('month', getLoggedInUser()->hasRole('Super Admin'), ['id' => 'monthSubscription']) }}
        {{ Form::hidden('year', getLoggedInUser()->hasRole('Super Admin'), ['id' => 'yearSubscription']) }}
        {{ Form::hidden('year', route('paypal.init'), ['id' => 'subscriptionPaypalInit']) }}
    </div>
@endsection
{{--let hospitalUrl = "{{ route('subscriptions.list.index') }}"--}}
{{--let isSuperAdminLogin = "{{ getLoggedInUser()->hasRole('Super Admin') }}"--}}
{{--let active = "{{ \App\Models\Subscription::STATUS_ARR[1] }}"--}}
{{--let inactive = "{{ \App\Models\Subscription::STATUS_ARR[0] }}"--}}
{{--let month = "{{ \App\Models\Subscription::MONTH }}"--}}
{{--let year = "{{ \App\Models\Subscription::YEAR }}"--}}
{{--    <script src="{{mix('assets/js/subscription/subscription.js')}}"></script>--}}
