@extends('landing.layouts.app')
@section('title')
    Contact Us
@endsection
@section('page_css')
    {{--    <link href="{{asset('assets/css/landing/landing.css')}}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link href="{{mix('landing_front/css/contact.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @php
        $settingValue = getSuperAdminSettingValue();
    @endphp

    <div class="contact-page">
        <!-- start hero section -->
        <section class="hero-section pt-120 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center mb-lg-0
                            mb-md-5 mb-sm-4 mb-3">
                        <div class="hero-content">
                            <h1 class="mb-0">
                                {{ __('messages.contact_us') }}
                            </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb
                                        justify-content-lg-start
                                        justify-content-center mb-lg-0 pb-lg-4">
                                    <li class="breadcrumb-item"><a
                                                href="{{ route('landing-home') }}"
                                                class="fs-18">{{ __('messages.landing.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-cyan
                                            fs-18" aria-current="page">{{ __('messages.contact_us') }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <img src="{{asset('landing_front/images/about-hero-img.png')}}"
                             alt="HMS-Sass" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <!-- start form-section -->
        <section class="form-section py-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-heading">
                            <h2 class="mb-3">{{ __('messages.contact_us') }}</h2>
                            <p class="mb-0">{{ __('messages.web_contact.get_in_touch') }}</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form p-60">
                    <div class="row flex-column-reverse flex-lg-row">
                        <div class="col-lg-6">
                            <div class="form">
                                <form id="superAdminContactEnquiryForm" method="POST" class="row">
                                    @method('POST')
                                    @csrf
                                    <div class="ajax-message-contact"></div>
                                    <div class="form-group col-md-6">
                                        <input id="firstName" type="text" name="first_name" class="form-control mb-md-4 mb-3
                                                px-md-4 py-sm-3 px-3 py-2 f-s-6"
                                               placeholder="{{__('messages.web_appointment.enter_your_first_name')}}"
                                               required="required"
                                               data-error="First name is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="lastName" type="text" name="last_name" class="form-control mb-md-4 mb-3
                                                px-md-4 py-sm-3 px-3 py-2 f-s-6"
                                               placeholder="{{__('messages.web_appointment.enter_your_last_name')}}"
                                               required="required"
                                               data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="email" type="email" name="email" class="form-control mb-md-4 mb-3
                                                px-md-4 py-sm-3 px-3 py-2 f-s-6"
                                               placeholder="{{__('messages.web_contact.enter_your_email')}}"
                                               required="required"
                                               data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="phone" type="tel" name="phone" class="form-control mb-md-4 mb-3
                                                px-md-4 py-sm-3 px-3 py-2 f-s-6 phoneNo"
                                               placeholder="{{__('messages.web_contact.enter_your_phone_number')}}"
                                               required="required"
                                               data-error="Phone is required">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea id="message" name="message" class="form-control
                                                px-md-4 py-sm-3 px-3 py-2 f-s-6"
                                                  placeholder="{{__('messages.web_contact.write_your_message')}}"
                                                  rows="3" required="required"
                                                  data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        @if(config('app.recaptcha.key'))
                                            <div class="form-group mb-4 captcha-customize">
                                                <div class="g-recaptcha"
                                                     id="g-recaptcha"
                                                     data-sitekey="{{config('app.recaptcha.key')}}"
                                                     data-callback="verifyRecaptchaCallback"
                                                     data-expired-callback="expiredRecaptchaCallback"
                                                >
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-8 mt-4">
                                        <button type="submit" class="btn btn-secondary mt-lg-5 mt-md-4">
                                            {{ __('messages.web_contact.send_message') }}
                                        </button>
                                    </div>
                                    {{ Form::hidden('superAdminEnquiryStore', route('super.admin.enquiry.store'), ['id' => 'superAdminEnquiryStore']) }}
                                    {{ Form::hidden('superAdminEnquiryGRecaptcha', config('app.recaptcha.key'), ['id' => 'superAdminEnquiryGRecaptcha']) }}
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-right bg-cyan p-60">
                                <div class="form-info">
                                    <div class="d-flex align-items-center
                                            mb-md-4 mb-3">
                                        <div class="icon bg-white d-flex
                                                justify-content-center
                                                align-items-center me-md-4
                                                me-3">
                                            <i class="fa-solid
                                                    fa-location-dot
                                                    text-secondary d-flex
                                                    justify-content-center
                                                    align-items-center"></i>
                                        </div>
                                        <div class="desc">
                                            <h3 class="text-white mb-0">{{ __('messages.common.address') }}</h3>
                                            <p class="text-white mb-0">
                                                {{ $settingValue['address']['value'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center
                                            mb-md-4 mb-3">
                                        <div class="icon bg-white d-flex
                                                justify-content-center
                                                align-items-center me-md-4
                                                me-3">
                                            <i class="fa-solid fa-at
                                                    text-secondary d-flex
                                                    justify-content-center
                                                    align-items-center"></i>
                                        </div>
                                        <div class="desc">
                                            <h3 class="text-white mb-0">{{ __('messages.enquiry.email') }}</h3>
                                            <a href="mailto:{{ $settingValue['email']['value'] }}" class="text-white">
                                                {{ $settingValue['email']['value'] }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <div class="icon bg-white d-flex
                                                justify-content-center
                                                align-items-center me-md-4
                                                me-3">
                                            <i class="fa-solid fa-phone
                                                    text-secondary d-flex
                                                    justify-content-center
                                                    align-items-center"></i>
                                        </div>
                                        <div class="desc">
                                            <h3 class="text-white mb-0">{{ __('messages.case.phone') }}</h3>
                                            <a href="tel:{{ $settingValue['phone']['value'] }}"
                                               class="text-white">{{ $settingValue['phone']['value'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end form-section -->


        <!-- start subscribe-section -->
    @include('landing.home.subscribe_section')
    <!-- end subscribe-section -->

    </div>

@endsection
@section('scripts')
{{--        <script src='https://www.google.com/recaptcha/api.js'></script>--}}
    {{--    <script>var toastData = ''</script>--}}
    {{--    <script src="{{ mix('assets/js/super_admin/contact_enquiry/contact_enquiry.js') }}"></script>--}}
@endsection
