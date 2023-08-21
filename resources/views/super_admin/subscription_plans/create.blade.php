@extends('layouts.app')
@section('title')
    {{__('messages.subscription_plans.add_subscription_plan')}}
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
                    {{ Form::open(['route' => 'super.admin.subscription.plans.store', 'id' => 'createSubscriptionPlanForm']) }}

                    @include('super_admin.subscription_plans.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/super_admin/subscription_plans/create-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/super_admin/subscription_plans/plan_features.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
