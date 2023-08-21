@extends('landing.layouts.app')
@section('title')
    {{ __('messages.landing.pricing') }}
@endsection
@section('page_css')
{{--    <link href="{{asset('assets/css/landing/landing.css')}}" rel="stylesheet" type="text/css"/>--}}
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <section class="hero-section pt-120 bg-light mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-sm-4 mb-3">
                    <div class="hero-content">
                        <h1 class="mb-0">
                            {{ __('messages.landing.pricing') }}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-start justify-content-center mb-lg-0 pb-lg-4">
                                <li class="breadcrumb-item"><a
                                            href="{{ route('landing-home') }}">{{ __('messages.landing.home') }} </a>
                                </li>
                                <li class="breadcrumb-item text-cyan fs-18"
                                    aria-current="page">{{ __('messages.landing.pricing') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end text-center">
                    <img src="{{asset('landing_front/images/about-hero-img.png')}}" alt="HMS-Sass" class="img-fluid"/>
                </div>
            </div>
        </div>
    </section>

    <div class="page-content">
        @include('flash::message')
        @include('landing.home.pricing_plan_page', ['screenFrom' => Route::currentRouteName()])
        {{ Form::hidden('getLoggedInUserdata', getLoggedInUser(), ['class' => 'getLoggedInUser']) }}
        {{ Form::hidden('logInUrl', url('login'), ['class' => 'logInUrl']) }}
        {{ Form::hidden('fromPricing', true, ['class' => 'fromPricing']) }}
        {{ Form::hidden('makePaymentURL', route('purchase-subscription'), ['class' => 'makePaymentURL']) }}
        {{ Form::hidden('subscribeText', __('messages.subscription_pricing_plans.choose_plan'), ['class' => 'subscribeText']) }}
{{--        {{ Form::hidden('toastData', json_encode(session('toast-data')), ['class' => 'toastData']) }}--}}
    </div>

@endsection
@section('page_scripts')
{{--    <script src="{{ asset('landing_front/js/jquery.toast.min.js') }}"></script>--}}
@endsection
@section('scripts')
{{--    <script src="//js.stripe.com/v3/"></script>--}}
    <script>
        {{--let getLoggedInUserdata = "{{ getLoggedInUser() }}"--}}
        {{--let logInUrl = "{{ url('login') }}"--}}
        {{--let fromPricing = true--}}
        {{--let makePaymentURL = "{{ route('purchase-subscription') }}"--}}
        {{--let subscribeText = "{{ __('messages.subscription_pricing_plans.choose_plan') }}"--}}
{{--        let toastData = JSON.parse('@json(session('toast-data'))')--}}
    </script>
    {{--    <script src="{{ mix('assets/js/subscriptions/free-subscription.js') }}"></script>--}}
    {{--    <script src="{{ mix('assets/js/subscriptions/payment-message.js') }}"></script>--}}
@endsection
