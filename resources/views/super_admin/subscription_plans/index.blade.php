@extends('layouts.app')
@section('title')
    {{__('messages.subscription_plan')}}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:subscription-plan-table/>
        </div>
        {{ Form::hidden('subscriptionPlanUrl', route('super.admin.subscription.plans.index'), ['id' => 'subscriptionPlanUrl']) }}
        {{ Form::hidden('adminSubscriptionPlanLang',__('messages.delete.subscription_plan'), ['id' => 'adminSubscriptionPlanLang']) }}
    </div>
@endsection
{{--let subscriptionPlanUrl = "{{ route('super.admin.subscription.plans.index') }}"--}}
{{--    <script src="{{ mix('assets/js/dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/super_admin/subscription_plans/subscription_plan.js') }}"></script>--}}
