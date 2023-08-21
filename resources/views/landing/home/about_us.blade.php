@extends('landing.layouts.app')
@section('title')
    {{ __('messages.web_home.about_us') }}
@endsection
@section('page_css')
    {{--    <link href="{{asset('assets/css/landing/landing.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{mix('landing_front/css/about.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <div class="about-page ">
        <!-- start hero section -->
        <section class="hero-section pt-120 bg-light ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-sm-4 mb-3">
                        <div class="hero-content ">
                            <h1 class="mb-0">
                                {{ __('messages.web_home.about_us') }}
                            </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-start justify-content-center  mb-lg-0 pb-lg-4 ">
                                    <li class="breadcrumb-item "><a href="{{ route('landing-home') }}"
                                                                    class="fs-18">{{ __('messages.web_home.home') }} </a>
                                    </li>
                                    <li class="breadcrumb-item text-cyan fs-18"
                                        aria-current="page">{{ __('messages.web_home.about_us') }}</li>
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

        <!--start work-section -->
        <section class="work-section py-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-heading ">
                            <h2>{{ $landingAboutUs['text_main'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="work-content">
                    <div class="row">
                        <div class="col-md-4 text-center mb-md-0 mb-2">
                            <span class="text-cyan bg-white text-center fs-64">
                                <img src="{{ isset($landingAboutUs['card_img_one']) ? asset($landingAboutUs['card_img_one']) : '' }}"
                                     alt="" width="40" height="40">
                            </span>
                            <h3>{{ $landingAboutUs['card_one_text'] }}</h3>
                            <p>{!! $landingAboutUs['card_one_text_secondary'] !!}</p>
                        </div>
                        <div class="col-md-4 text-center mb-md-0 mb-2">
                            <span class="text-cyan bg-white text-center fs-64">
                                  <img src="{{ isset($landingAboutUs['card_img_two']) ? asset($landingAboutUs['card_img_two']) : '' }}"
                                       alt="" width="40" height="40">
                            </span>
                            <h3>{{ $landingAboutUs['card_two_text'] }}</h3>
                            <p>{!! $landingAboutUs['card_two_text_secondary']  !!}</p>
                        </div>
                        <div class="col-md-4 text-center ">
                            <span class="text-cyan bg-white text-center fs-64">
                                <img src="{{ isset($landingAboutUs['card_img_three']) ? asset($landingAboutUs['card_img_three']) : '' }}"
                                     alt="" width="40" height="40">
                            </span>
                            <h3>{{ $landingAboutUs['card_three_text'] }}</h3>
                            <p>{!! $landingAboutUs['card_three_text_secondary'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end work-section -->

        <!-- start-about-section -->
        <section class="about-section bg-light py-120">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-8 col-md-12">
                        <div class="row justify-content-between ">
                            <div class=" col-md-6 about-content-block mb-4 ">
                                <div class="about-content bg-white py-20 h-100">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-3 col-sm-2 col-3">
                                            <img class="card-img"
                                                 src="{{ isset($sectionFour['img_url_one']) ? asset($sectionFour['img_url_one']) : asset('landing_front/images/seo.png') }}"
                                                 alt="built-seo">
                                        </div>
                                        <div class="col-md-9 col-sm-10 ">
                                            <div class="card-body p-0">
                                                <h3 class="mt-sm-0 mt-3">{{ $sectionFour['card_text_one'] }}</h3>
                                                <p class="fs-14">{!! $sectionFour['card_text_one_secondary'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 about-content-block mb-4">
                                <div class="about-content bg-white py-20  h-100">
                                    <div class="row justify-content-between align-items-center">
                                        <div class=" col-md-3 col-sm-2 col-3">
                                            <img class="card-img"
                                                 src="{{ isset($sectionFour['img_url_two']) ? asset($sectionFour['img_url_two']) : asset('landing_front/images/profile.png') }}"
                                                 alt="hospital-profile">
                                        </div>
                                        <div class="col-md-9 col-sm-10">
                                            <div class="card-body p-0">
                                                <h3 class="mt-sm-0 mt-3">{{ $sectionFour['card_text_two'] }}</h3>
                                                <p class="fs-14">{!! $sectionFour['card_text_two_secondary'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 about-content-block mb-lg-0 mb-4">
                                <div class="about-content bg-white py-20 h-100">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-3 col-sm-2 col-3">
                                            <img class="card-img"
                                                 src="{{ isset($sectionFour['img_url_three']) ? asset($sectionFour['img_url_three']) : asset('landing_front/images/online.png') }}"
                                                 alt="online-appointment">
                                        </div>
                                        <div class=" col-md-9 col-sm-10">
                                            <div class="card-body p-0">
                                                <h3 class="mt-sm-0 mt-3">{{ $sectionFour['card_text_three'] }}</h3>
                                                <p class="fs-14">{!! $sectionFour['card_text_three_secondary'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 about-content-block mb-lg-0 mb-4">
                                <div class="about-content bg-white py-20 h-100">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-3 col-sm-2 col-3">
                                            <img class="card-img w-75"
                                                 src="{{ isset($sectionFour['img_url_four']) ? asset($sectionFour['img_url_four']) : asset('landing_front/images/articles.png') }}"
                                                 alt="articles">
                                        </div>
                                        <div class="col-md-9 col-sm-10">
                                            <div class="card-body p-0">
                                                <h3 class="mt-sm-0 mt-3">{{ $sectionFour['card_text_four'] }}</h3>
                                                <p class="fs-14">{!! $sectionFour['card_text_four_secondary'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  text-lg-end text-center mt-lg-0 mt-5">
                        <img src="{{ isset($landingAboutUs['main_img_one']) ? asset($landingAboutUs['main_img_one']) : asset('landing_front/images/about.png') }}"
                             alt="HMS-Sass-about" class="img-fluid"/>
                    </div>

                </div>
            </div>
        </section>
        <!-- end-about-section -->

        <!-- start-service-section -->
    @include('landing.home.count_section')
    <!-- end-service-section -->

        <!-- start-question-section -->
        <section class="question-section py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <img src="{{ isset($landingAboutUs['main_img_two']) ? ($landingAboutUs['main_img_two']) : asset('landing_front/images/about-question.png') }}"
                             alt="about-question" class="img-fluid"/>
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion mt-60" id="accordionExample">
                            @foreach($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{$faq->id}}">
                                        <button class="accordion-button {{$loop->first ? '' : 'collapsed'}} fs-18 p-lg-4 p-sm-3"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{$faq->id}}"
                                                aria-expanded="{{$loop->first ? 'true' : 'false'}}"
                                                aria-controls="#collapse{{$faq->id}}">
                                            {{$faq->question}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$faq->id}}"
                                         class="accordion-collapse collapse {{$loop->first ? 'show' : ''}}"
                                         aria-labelledby="heading-{{$faq->id}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body panel">
                                            <p class="fs-14">{!! $faq->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end-question-section -->

        <!-- start-plan-section -->
    @if(getLoggedInUser() == null || !getLoggedInUser()->hasRole('Super Admin'))
        <!-- start-plan-section -->
        @include('landing.home.pricing_plan_page', ['screenFrom' => Route::currentRouteName()])

    @endif
    <!-- end-plan-section -->

        <!-- start subscribe-section -->
    @include('landing.home.subscribe_section')
    <!-- end subscribe-section -->
        
        {{ Form::hidden('getLoggedInUserdata', getLoggedInUser(), ['class' => 'getLoggedInUser']) }}
        {{ Form::hidden('logInUrl', url('login'), ['class' => 'logInUrl']) }}
        {{ Form::hidden('fromPricing', true, ['class' => 'fromPricing']) }}
        {{ Form::hidden('makePaymentURL', route('purchase-subscription'), ['class' => 'makePaymentURL']) }}
        {{ Form::hidden('subscribeText', __('messages.subscription_pricing_plans.choose_plan'), ['class' => 'subscribeText']) }}
        {{ Form::hidden('toastData', json_encode(session('toast-data')), ['class' => 'toastData']) }}
    
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
