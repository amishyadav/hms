@extends('layouts.app')
@section('title')
    {{ __('messages.hospital_details') }}
@endsection
@section('page_css')
    {{--    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{route('hospital.edit',['hospital' => $users['hospital']->id]) }}"
                   class="btn btn-primary me-4">{{ __('messages.common.edit') }}</a>
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            @include('super_admin.users.show_fields')
            @include('super_admin.users.billing_modal')
        </div>
        {{ Form::hidden('showUserIndexURL', route('super.admin.hospitals.index'), ['id' => 'showUserIndexURL']) }}
        {{ Form::hidden('showUserURL', route('super.admin.hospitals.datatable.index'), ['id' => 'showUserURL']) }}
        {{ Form::hidden('showUserBillingURL', route('super.admin.hospital.billing.index'), ['id' => 'showUserBillingURL']) }}
        {{ Form::hidden('showUserTransactionURL', route('super.admin.hospital.transaction.index'), ['id' => 'showUserTransactionURL']) }}
        {{ Form::hidden('userStripeType', \App\Models\Subscription::PAYMENT_TYPES[1], ['id' => 'userStripeType']) }}
        {{ Form::hidden('userPaypalType', \App\Models\Subscription::PAYMENT_TYPES[2], ['id' => 'userPaypalType']) }}
        {{ Form::hidden('userRazorpayType', \App\Models\Subscription::PAYMENT_TYPES[3], ['id' => 'userRazorpayType']) }}
        {{ Form::hidden('userCashType', \App\Models\Subscription::PAYMENT_TYPES[4], ['id' => 'userCashType']) }}
        {{ Form::hidden('userStatusActive', \App\Models\Subscription::STATUS_ARR[1], ['id' => 'userStatusActive']) }}
        {{ Form::hidden('userStatusDeactive', \App\Models\Subscription::STATUS_ARR[0], ['id' => 'userStatusDeactive']) }}
        {{ Form::hidden('userSubscriptionMonth', \App\Models\Subscription::MONTH, ['id' => 'userSubscriptionMonth']) }}
        {{ Form::hidden('userSubscriptionYear', \App\Models\Subscription::YEAR, ['id' => 'userSubscriptionYear']) }}
        {{ Form::hidden('userPaidTransaction', \App\Models\Transaction::PAID, ['id' => 'userPaidTransaction']) }}
        {{ Form::hidden('userUnpaidTransaction', \App\Models\Transaction::UNPAID, ['id' => 'userUnpaidTransaction']) }}
        {{ Form::hidden('superAdminHospitalBillingModalID', url('hospital-billing-modal'), ['id' => 'superAdminHospitalBillingModalID']) }}
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script type="text/javascript">--}}
{{--let userUrl = "{{ route('super.admin.hospitals.index') }}"--}}
{{--let showUrl = "{{ route('super.admin.hospitals.datatable.index') }}"--}}
{{--let billingUrl = "{{ route('super.admin.hospital.billing.index') }}"--}}
{{--let transactionUrl = "{{ route('super.admin.hospital.transaction.index') }}"--}}
{{--let stripe = "{{ \App\Models\Subscription::PAYMENT_TYPES[1] }}";--}}
{{--let paypal = "{{ \App\Models\Subscription::PAYMENT_TYPES[2] }}";--}}
{{--let razorPay = "{{ \App\Models\Subscription::PAYMENT_TYPES[3] }}";--}}
{{--let cash = "{{ \App\Models\Subscription::PAYMENT_TYPES[4] }}";--}}
{{--let active = "{{ \App\Models\Subscription::STATUS_ARR[1] }}";--}}
{{--let deactive = "{{ \App\Models\Subscription::STATUS_ARR[0] }}";--}}
{{--let month = "{{ \App\Models\Subscription::MONTH }}";--}}
{{--let year = "{{ \App\Models\Subscription::YEAR }}";--}}
{{--let paid = "{{ \App\Models\Transaction::PAID }}";--}}
{{--let unpaid = "{{ \App\Models\Transaction::UNPAID }}";--}}
{{--    <script src="{{mix('assets/js/super_admin/users/hospitals_data_listing.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/super_admin/users/billing.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/super_admin/users/transaction.js')}}"></script>--}}
