@extends('landing.layouts.app')
@section('title')
    {{ __('messages.web_home.home') }}
@endsection
@section('page_css')
    {{--    <link href="{{asset('assets/css/landing/landing.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{mix('landing_front/css/home.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <div class="home-page ">
        <!-- start banner section -->
        <section class="banner-section bg-light py-100" id="home">
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-lg-row">
                    <div class="col-lg-6 text-lg-start text-center">
                        <div class="banner-content mt-lg-0 mt-sm-5 mt-4 pe-lg-4">
                            <h1 class="mb-md-3 mb-2"> {{ $sectionOne['text_main'] }} </h1>
                            @if(!getLoggedInUser())
                                <p class="mb-md-5 mb-4"> {{ $sectionOne['text_secondary'] }}</p>
                            @endif
                            <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                                @if(!getLoggedInUser())
                                    <a href="{{ route('register') }}" data-turbo="false"
                                       class="btn btn-primary me-3">{{ __('messages.web_home.sign_up') }}</a>
                                @endif
                                <a href="{{ route('landing.contact.us') }}"
                                   class="btn btn-secondary ms-1">{{ __('messages.contact_us') }}</a>
                            </div>
                            <span class="ps-xl-2 mb-3 mb-lg-0 d-lg-block mt-3 d-none">{{ __('messages.landing.call') }} :
                                    <a href="tel:{{$settingValue['phone']['value']}}"
                                       class="text-decoration-none text-primary">
                                        {{$settingValue['phone']['value']}}
                                    </a>
                                </span>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <img src="{{ isset($sectionOne['img_url']) ? asset($sectionOne['img_url']) : asset('landing_front/images/hospital.png') }}" alt="manage hospital"
                             class="img-fluid"/>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner section -->

        <!-- start protect-health section -->
        <section class="health-section pt-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-heading">
                            <h2 class="mb-3">{{ $sectionTwo['text_main'] }}</h2>
                            <p class="mb-0">{{ $sectionTwo['text_secondary'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="protect-health">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-6 my-xl-0 py-xl-0 my-2 py-1">
                            <div class="card">
                                <div class="row justify-content-md-between justify-content-center text-center text-sm-start">
                                    <div class=" col-md-4 col-sm-3 col-4">
                                        <img class="card-img home-section-two-img"
                                             src="{{ isset($sectionTwo['card_one_image']) ? asset($sectionTwo['card_one_image']) : asset('landing_front/images/schedule.png')}}"
                                             alt="schedule appointment">
                                    </div>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="card-body p-0">
                                            <h3 class="mt-sm-0 mt-3">{{ $sectionTwo['card_one_text'] }}</h3>
                                            <p class="card-text">{{ html_entity_decode($sectionTwo['card_one_text_secondary']) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 my-xl-0 py-xl-0 my-2 py-1">
                            <div class="card">
                                <div class="row justify-content-md-between justify-content-center text-center text-sm-start">
                                    <div class="col-md-4 col-sm-3 col-4">
                                        <img class="card-img"
                                             src="{{ isset($sectionTwo['card_two_image']) ? asset($sectionTwo['card_two_image']) : asset('landing_front/images/opd.png') }}"
                                             alt="OPD Management">
                                    </div>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="card-body p-0 ">
                                            <h3 class="mt-sm-0 mt-3">{{ $sectionTwo['card_two_text'] }}</h3>
                                            <p class="card-text">{{ html_entity_decode($sectionTwo['card_two_text_secondary']) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 my-xl-0 py-xl-0 my-2 py-1">
                            <div class="card">
                                <div class="row justify-content-md-between justify-content-center text-center text-sm-start">
                                    <div class="col-md-4 col-sm-3 col-4">
                                        <img class="card-img"
                                             src="{{ isset($sectionTwo['card_third_image']) ? asset($sectionTwo['card_third_image']) : asset('landing_front/images/ipd.png') }}"
                                             alt="IPD Management">
                                    </div>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="card-body p-0">
                                            <h3 class="mt-sm-0 mt-3">{{ $sectionTwo['card_third_text'] }}</h3>
                                            <p class="card-text">{{ html_entity_decode($sectionTwo['card_third_text_secondary']) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end protect-health section -->

        <!-- start hospital-sass-section -->
        <section class="hospital-sass-section overflow-hidden pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-12 margin-b-80px">
                        <div class="row align-items-center flex-column-reverse flex-lg-row">
                            <div class=" col-lg-6">
                                <div class="sass-left-content bg-light">
                                    <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                                        <img class="img-fluid" src="{{asset('landing_front/images/frame_9.png')}}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 position-relative">
                                <div class="sass-right-content ms-lg-5 ps-lg-5">
                                    <div class="section-heading mb-0 ">
                                        <h2 class="mb-3">{{ $sectionThree['text_main'] }}</h2>
                                        <p class="mb-4 pb-3">{{ $sectionThree['text_secondary'] }}
                                        </p>
                                    </div>
                                    <div class="sass-desc mb-4">
                                        <div class="row">
                                            <div class="col-sm-6 d-flex align-items-center mb-3 pb-1">
                                                <i class="fa-solid fa-check d-flex align-items-center justify-content-center me-2 text-white bg-primary"></i>
                                                <p class="mb-0">{{ $sectionThree['text_one'] }}</p>
                                            </div>
                                            <div class="col-sm-6 d-flex align-items-center mb-3 pb-1">
                                                <i class="fa-solid fa-check d-flex align-items-center justify-content-center me-2 text-white bg-primary"></i>
                                                <p class="mb-0">{{ $sectionThree['text_two'] }}</p>
                                            </div>
                                            @if(!empty($sectionThree['text_three']))
                                                <div class="col-sm-6 d-flex align-items-center mb-3 pb-1">
                                                    <i class="fa-solid fa-check d-flex align-items-center justify-content-center me-2 text-white bg-primary"></i>
                                                    <p class="mb-0">{{$sectionThree['text_three']}}</p>
                                                </div>
                                            @endif
                                            @if(isset($sectionThree['text_four']))
                                                <div class="col-sm-6 d-flex align-items-center mb-3 pb-1">
                                                    <i class="fa-solid fa-check d-flex align-items-center justify-content-center me-2 text-white bg-primary"></i>
                                                    <p class="mb-0">{{$sectionThree['text_four']}}</p>
                                                </div>
                                            @endif
                                            @if(isset($sectionThree['text_five']))
                                                <div class="col-sm-6 d-flex align-items-center mb-3 pb-1">
                                                    <i class="fa-solid fa-check d-flex align-items-center justify-content-center me-2 text-white bg-primary"></i>
                                                    <p class="mb-0">{{$sectionThree['text_five']}}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sass-btn d-flex col-lg-12">
                                        <a href="{{ route('landing.contact.us') }}"
                                           class="btn btn-primary me-3">{{ __('messages.contact_us') }}</a>
                                        @if(!getLoggedInUser())
                                            <a href="{{ route('register') }}" data-turbo="false"
                                               class="btn btn-secondary ms-1">{{ __('messages.web_home.sign_up') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hospital-sass-section -->

        <!-- start grow-your-hospital section -->
    @include('landing.home.grow_hospital_section')
        <!-- end grow-your-hospital section -->

        <!-- start-service-section -->
        @include('landing.home.count_section')
        <!-- end-service-section -->

        <!--start our-hospitals sectiom -->
{{--        <section class="our-hospitals-section py-120">--}}
{{--            <div class="container">--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="col-lg-6 text-center">--}}
{{--                        <div class="section-heading">--}}
{{--                            <h2>{{ __('messages.our_hospitals') }}</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="our-hospitals">--}}
{{--                    <div class="row justify-content-between">--}}
{{--                        @foreach($hospitals as $hospital)--}}
{{--                            <div class="col-lg-4 col-md-6 mb-lg-5 mb-md-4 mb-3 d-flex align-items-stretch ps-4 ps-md-3">--}}
{{--                                <div class="card flex-fill ms-lg-4 me-xl-5 ms-md-4 me-md-2 ms-4 ps-1 ps-md-0">--}}
{{--                                    <a href="{{ route('front',$hospital->username) }}">--}}
{{--                                        <div class="row justify-content-between align-items-center">--}}
{{--                                            <div class="col-md-2 col-1 ps-xl-2 ps-2">--}}
{{--                                                <img class="card-img rounded-circle"--}}
{{--                                                     src="{{ isset($hospital) ? asset($hospital['image_url']) : ''}}"--}}
{{--                                                     alt="New-Horizon">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-10 col-11">--}}
{{--                                                <div class="card-body d-flex flex-column py-4">--}}
{{--                                                    <h3>{{ $hospital->full_name }}</h3>--}}
{{--                                                    <p class="card-text">{{ $hospital->email }}</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="pagination-section">--}}

{{--                    {{ $hospitals->links() }}--}}

{{--                    --}}{{--                    <nav aria-label="Page navigation example">--}}
{{--                    --}}{{--                        <ul class="pagination mb-0 justify-content-center flex-wrap">--}}
{{--                    --}}{{--                            <li class="page-item">--}}
{{--                    --}}{{--                                <a class="page-link previous" href="#" aria-label="Previous">--}}
{{--                    --}}{{--                                            <span aria-hidden="true">--}}
{{--                    --}}{{--                                                <i class="fa-solid fa-angle-left"></i>--}}
{{--                    --}}{{--                                            </span>--}}
{{--                    --}}{{--                                    <span class="sr-only">Previous</span>--}}
{{--                    --}}{{--                                </a>--}}
{{--                    --}}{{--                            </li>--}}
{{--                    --}}{{--                            <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
{{--                    --}}{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    --}}{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    --}}{{--                            <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                    --}}{{--                            <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                    --}}{{--                            <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
{{--                    --}}{{--                            <li class="page-item">--}}
{{--                    --}}{{--                                <a class="page-link next" href="#" aria-label="Next">--}}
{{--                    --}}{{--                                            <span aria-hidden="true">--}}
{{--                    --}}{{--                                                <i class="fa-solid fa-angle-right"></i>--}}
{{--                    --}}{{--                                            </span>--}}
{{--                    --}}{{--                                    <span class="sr-only">Next</span>--}}
{{--                    --}}{{--                                </a>--}}
{{--                    --}}{{--                            </li>--}}
    {{--                    --}}{{--                        </ul>--}}
    {{--                    --}}{{--                    </nav>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    <!--end our-hospitals section -->
    @if(getLoggedInUser() == null || !getLoggedInUser()->hasRole('Super Admin'))

        <!-- start-plan-section -->
            <div class="mt-5">
                @include('landing.home.pricing_plan_page', ['screenFrom' => Route::currentRouteName()])
            </div>

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
{{--        {{ Form::hidden('toastData', json_encode(session('toast-data')), ['class' => 'toastData']) }}--}}

    </div>

@endsection
@section('page_scripts')
{{--    <script src="{{ asset('landing_front/js/jquery.toast.min.js') }}"></script>--}}
@endsection
@section('scripts')
    <script>
        {{--let getLoggedInUserdata = "{{ getLoggedInUser() }}"--}}
        {{--let logInUrl = "{{ url('login') }}"--}}
        {{--let fromPricing = true--}}
        {{--let makePaymentURL = "{{ route('purchase-subscription') }}"--}}
        {{--let subscribeText = "{{ __('messages.subscription_pricing_plans.choose_plan') }}"--}}
        {{--let toastData = JSON.parse('@json(session('toast-data'))')--}}
    </script>
    {{--    <script src="{{ mix('assets/js/subscriptions/free-subscription.js') }}"></script>--}}
    {{--    <script src="{{ mix('assets/js/subscriptions/payment-message.js') }}"></script>--}}
@endsection
