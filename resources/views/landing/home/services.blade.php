@extends('landing.layouts.app')
@section('title')
    {{ __('messages.services') }}
@endsection
@section('page_css')
    {{--    <link href="{{asset('assets/css/landing/landing.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{asset('landing_front/css/slick.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link href="{{asset('landing_front/css/slick-theme.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link href="{{mix('landing_front/css/services.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <div class="services-page">

        <!-- start hero section -->
        <section class="hero-section pt-120 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-sm-4 mb-3">
                        <div class="hero-content">
                            <h1 class="mb-0">
                                {{ __('messages.services') }}
                            </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-start justify-content-center mb-lg-0 pb-lg-4">
                                    <li class="breadcrumb-item"><a
                                                href="{{ route('landing-home') }}">{{ __('messages.web_home.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-cyan fs-18"
                                        aria-current="page">{{ __('messages.services') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <img src="{{asset('landing_front/images/about-hero-img.png')}}" alt="HMS-Sass"
                             class="img-fluid"/>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <!-- start grow-your-hospital section -->
    @include('landing.home.grow_hospital_section')
    <!-- end grow-your-hospital section -->

        <!-- start-service-section -->
        <section class="service-section bg-secondary py-80 mb-5">
            <div class="container mb-5">
                <div class="slick-slider services" id="services">
                    @foreach($serviceSlider as $image)
                        <div class="slide col-lg-3 overflow-hidden ps-2 pe-2">
                            <div class="client-logo">
                                <img class="img-fluid custom-service-slider" src="{{asset($image->image_url)}}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end-service-section -->

        <!-- start-plan-section -->
    @if(getLoggedInUser() == null || !getLoggedInUser()->hasRole('Super Admin'))
        <!-- start-plan-section -->
        @include('landing.home.pricing_plan_page', ['screenFrom' => Route::currentRouteName()])

    @endif
    <!-- end-plan-section -->

        <!-- start testimonial section -->
        <section class="testimonial-section overflow-hidden bg-light pt-80">
            <div class="container">
                <div class="row testimonial-block justify-content-center">
                    <div class="col-xl-8 col-lg-10 testimonial-carousel" id="testimonial-carousel">
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial-card rounded-20 ">
                                <div class="row justify-content-between ">
                                    <div class="col-md-5 col-sm-5 profile-img text-center">
                                        <img src="{{asset(!empty($testimonial->image_url) ? $testimonial->image_url : asset('landing_front/images/thomas-james.png'))}}"
                                             alt="profile" class="rounded-20 img-fluid">
                                    </div>
                                    <div class="col-md-7 col-sm-7">
                                        <p class="mt-md-5 ps-3 d-md-block d-none">
                                            {!! $testimonial->description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="profile-box bg-cyan rounded-20 pt-md-3 pb-md-3 p-3 position-relative d-flex align-items-stretch flex-column">
                                    <div class="row justify-content-end align-items-stretch">
                                       
                                            <div class="col-md-7 col-sm-5 mt-md-0 mt-sm-4 mt-5">
                                                <h3 class="profile-name text-white mb-0 ps-sm-3">{{Str::limit($testimonial->name, 20)}}</h3>
                                                <p class="text-white mb-0 ps-sm-3">{{Str::limit($testimonial->position, 20)}}</p>
                                            </div>
                                            <p class="mt-xl-5 mt-4 text-white ps-sm-3  d-md-none d-block ">
                                                {!! ($testimonial->description) !!}
                                            </p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- end testimonial section -->

        <!-- start subscribe-section -->
    @include('landing.home.subscribe_section')
    <!-- end subscribe-section -->
        {{ Form::hidden('getLoggedInUserdata', getLoggedInUser(), ['class' => 'getLoggedInUser']) }}
        {{ Form::hidden('logInUrl', url('login'), ['class' => 'logInUrl']) }}
        {{ Form::hidden('fromPricing', true, ['class' => 'fromPricing']) }}
        {{ Form::hidden('makePaymentURL', route('purchase-subscription'), ['class' => 'makePaymentURL']) }}
        {{ Form::hidden('subscribeText', __('messages.subscription_pricing_plans.choose_plan'), ['class' => 'subscribeText']) }}
{{--        {{ Form::hidden('toastData', json_encode(session('toast-data')), ['class' => 'toastData']) }}--}}

    </div>

@endsection
@section('page_scripts')
{{--    <script src="{{asset('landing_front/js/slick.min.js')}}"></script>--}}
    <script>
        
        // if($('#testimonial-carousel').length) {
        //     $('#testimonial-carousel').slick({
        //         dots: true,
        //         autoplay: false,
        //         autoplayspeed: 1600,
        //         centerPadding: '0',
        //         slidesToShow: 1,
        //         slidesToScroll: 1,
        //     })   
        // }
        //
        // if($('#services').length)
        // {
        //     $('#services').slick({
        //         dots: true,
        //         arrows: false,
        //         autoplay: true,
        //         autoplayspeed: 1600,
        //         centerPadding: '0',
        //         slidesToShow: 4,
        //         slidesToScroll: 1,
        //         responsive: [
        //             {
        //                 breakpoint: 991,
        //                 settings: {
        //                     slidesToShow: 3,
        //                 },
        //             },
        //             {
        //                 breakpoint: 767,
        //                 settings: {
        //                     slidesToShow: 2,
        //                 },
        //             },
        //             {
        //                 breakpoint: 480,
        //                 settings: {
        //                     slidesToShow: 1
        //                 },
        //             },
        //         ],
        //     })   
        // }
    </script>
@endsection
@section('scripts')
{{--    <script src="{{asset('landing_front/js/slick.min.js')}}"></script>--}}
{{--<script src="//js.stripe.com/v3/"></script>--}}
<script>
    {{--let getLoggedInUserdata = "{{ getLoggedInUser() }}"--}}
    {{--let logInUrl = "{{ url('login') }}"--}}
    {{--let fromPricing = true--}}
    {{--let makePaymentURL = "{{ route('purchase-subscription') }}"--}}
    {{--let subscribeText = "{{ __('messages.subscription_pricing_plans.choose_plan') }}"--}}
{{--    let toastData = JSON.parse('@json(session('toast-data'))')--}}
</script>
{{--    <script src="{{ mix('assets/js/subscriptions/free-subscription.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/subscriptions/payment-message.js') }}"></script>--}}
@endsection
