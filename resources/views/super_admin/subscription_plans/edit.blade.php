@extends('layouts.app')
@section('title')
    {{ __('messages.subscription_plans.edit_subscription_plan') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('super.admin.subscription.plans.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::hidden('isEdit', true, ['class' => 'isEdit']) }}
                    {{ Form::hidden('planPrice', $subscriptionPlan->price, ['id' => 'planPrice']) }}
                    {{ Form::model($subscriptionPlan, ['route' => ['super.admin.subscription.plans.update', $subscriptionPlan->id], 'method' => 'put', 'id' => 'editSubscriptionPlanForm']) }}

                    @include('super_admin.subscription_plans.edit_fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--let isEdit = true;--}}
{{--let planPrice = '{{ $subscriptionPlan->price }}';--}}
{{--    <script src="{{ mix('assets/js/super_admin/subscription_plans/create-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/super_admin/subscription_plans/plan_features.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
