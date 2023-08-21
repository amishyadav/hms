@extends('web.layouts.front')
@section('title')
    {{ __('messages.contact_us') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/contacts/contact.css') }}">--}}
    {{--    <link href="{{ mix('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link href="{{ mix('assets/css/selectize-input.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link rel="stylesheet" href="{{ mix('web_front/css/hospital-contact.css') }}">--}}
@endsection
@php
    $enquiry = request()->query('enquiry');
    $hospitalSettingValue = getSettingValue();
@endphp
@section('content')
    <div class="contact-page">
        <!-- start hero section -->
        <section class="hero-section position-relative p-t-60 border-bottom-right-rounded border-bottom-left-rounded bg-gray overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center">
                        <div class="hero-content">
                            <h1 class="mb-3 pb-1">
                                {{ __('messages.web_home.contact') }}
                            </h1>
                            <?php
                            $userName = request()->segment(2);
                            ?>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-start justify-content-center mb-lg-0 mb-5">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('front',$userName) }}">{{ __('messages.web_home.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ __('messages.web_home.contact') }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <img src="{{ asset('web_front/images/page-banner/contact.png') }}" alt="Infy Care" class="img-fluid" />
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <!-- start service-section -->
        <section class="information-section p-t-120 p-b-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 information-block d-flex align-items-stretch">
                        <div class="card text-center mx-lg-2 flex-fill">
                            <div class="icon-information-box d-flex align-items-center justify-content-center mx-auto">
                                <i class="fa-solid fa-phone fs-3"></i>
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <a href="tel:{{ $hospitalSettingValue['hospital_phone']['value'] }}" class="text-decoration-none fs-5 text-success my-2">
                                    {{ $hospitalSettingValue['hospital_phone']['value'] }}
                                </a>
                                <span class="text-secondary fw-light">{{ __('messages.web_contact.call_today') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 information-block d-flex align-items-stretch">
                        <div class="card text-center mx-lg-2 flex-fill">
                            <div class="icon-information-box d-flex align-items-center justify-content-center mx-auto">
                                <i class="fa-solid fa-envelope fs-3"></i>
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <a href="mailto:{{ $hospitalSettingValue['hospital_email']['value'] }}"
                                   class="text-decoration-none fs-5 text-success my-2">
                                    {{ $hospitalSettingValue['hospital_email']['value'] }}
                                </a>
                                <span class="text-secondary fw-light">{{ __('messages.web_home.contact_hospital') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 information-block d-flex align-items-stretch">
                        <div class="card text-center mx-lg-2 flex-fill">
                            <div class="icon-information-box d-flex align-items-center justify-content-center mx-auto">
                                <i class="fa-solid fa-clock fs-3"></i>
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <p class="fs-5 text-success fw-normal my-2">
                                    {{ $hospitalSettingValue['hospital_from_time']['value'] }}
                                </p>
                                <span class="text-secondary fw-light">{{ __('messages.web_contact.open_hours') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 information-block d-flex align-items-stretch">
                        <div class="card text-center mx-lg-2 flex-fill">
                            <div class="icon-information-box d-flex align-items-center justify-content-center mx-auto">
                                <i class="fa-solid fa-location-dot fs-3"></i>
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <p class="fs-5 text-success fw-normal my-2">
                                    {{ $hospitalSettingValue['hospital_address']['value'] }}
                                </p>
                                <span class="text-secondary fw-light">{{ __('messages.web_contact.our_location') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="btn-group mt-4 mt-xl-5">
                        @if($hospitalSettingValue['facebook_url']['value'] != '' && !empty($hospitalSettingValue['facebook_url']['value']))
                            <a href="{{ $hospitalSettingValue['facebook_url']['value'] }}" class="btn btn-primary fs-4" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        @endif
                        @if($hospitalSettingValue['twitter_url']['value'] != '' && !empty($hospitalSettingValue['twitter_url']['value']))
                            <a href="{{ $hospitalSettingValue['twitter_url']['value'] }}" class="btn btn-primary fs-4" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        @endif
                        @if($hospitalSettingValue['instagram_url']['value'] != '' && !empty($hospitalSettingValue['instagram_url']['value']))
                            <a href="{{ $hospitalSettingValue['instagram_url']['value'] }}" class="btn btn-primary fs-4" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        @endif
                        @if($hospitalSettingValue['linkedIn_url']['value'] != '' && !empty($hospitalSettingValue['linkedIn_url']['value']))
                            <a href="{{ $hospitalSettingValue['linkedIn_url']['value'] }}" class="btn btn-primary fs-4" target="_blank">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- end service-section -->
        
        <!-- start contact-form section -->
        <section class="contact-form-section p-b-200">
            <div class="container">
                <div class="bg-contact-img">
                    <div class="row justify-content-end">
                        <div class="col-xl-6 col-lg-8">
{{--                            <form method="post" id="enquiryCreateForm" class="book-appointment-form">--}}
{{--                                @method('POST')--}}
{{--                                @csrf--}}
{{--                                @include('flash::message')--}}
{{--                                <div class="ajax-message"></div>--}}
{{--                                @if ($errors->any())--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        <ul class="mb-0">--}}
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                <li>{{ $error }}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <div class="row">--}}
{{--                                    <input type="hidden" name="hospital_username" value="{{ request()->segment(2) }}">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                            <div class="contact-form__input-block">--}}
{{--                                            <label>{{ __('messages.web_contact.your_name') }}</label>--}}
{{--                                            <input type="text" name="full_name" id="full_name" class="form-control" required--}}
{{--                                                   data-error="Please enter your name"--}}
{{--                                                   placeholder="{{ __('messages.web_contact.enter_your_name') }}">--}}
{{--                                            <div class="help-block with-errors"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <div class="contact-form__input-block">--}}
{{--                                            <label>{{ __('messages.web_contact.your_email') }}</label>--}}
{{--                                            <input type="email" name="email" id="email" class="form-control" required--}}
{{--                                                   data-error="{{ __('messages.web_contact.enter_your_email') }}"--}}
{{--                                                   placeholder="{{ __('messages.web_contact.enter_your_email') }}">--}}
{{--                                            <div class="help-block with-errors"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <div class="contact-form__input-block">--}}
{{--                                            <label>{{ __('messages.web_contact.phone_number') }}</label>--}}
{{--                                            <input type="tel"--}}
{{--                                                   class="form-control {{ $errors->has('contact_no')?'is-invalid':'' }}"--}}
{{--                                                   id="phoneNumber" name="contact_no" value="{{ old('contact_no') }}"--}}
{{--                                                   placeholder="{{ __('messages.web_contact.contact_no') }}" required--}}
{{--                                                   data-error="{{ __('messages.web_contact.please_enter_your_phone_number') }}"--}}
{{--                                                   onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'>--}}
{{--                                            <div class="help-block with-errors"></div>--}}
{{--                                            {{ Form::hidden('prefix_code',null,['id'=>'prefix_code']) }}--}}
{{--                                            <span id="valid-msg" class="hide">✓ Valid</span>--}}
{{--                                            <span id="error-msg" class="hide"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <div class="contact-form__input-block">--}}
{{--                                            <label>{{ __('messages.web_contact.select_enquiry') }}</label>--}}
{{--                                            <select name="type" class="general" id="general">--}}
{{--                                                <option value="1">{{ \App\Models\Enquiry::TYPE_GENERAL }}</option>--}}
{{--                                                <option value="2">{{ \App\Models\Enquiry::TYPE_FEEDBACK }}</option>--}}
{{--                                                <option value="3">{{ \App\Models\Enquiry::TYPE_RESIDENTIAL }}</option>--}}
{{--                                            </select>--}}
{{--                                            <div class="help-block with-errors"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="contact-form__input-block">--}}
{{--                                        <label>{{ __('messages.web_contact.your_message') }}</label>--}}
{{--                                        <textarea name="message" class="form-control" id="message" cols="30" rows="6" required--}}
{{--                                                  data-error="{{ __('messages.web_contact.write_your_message') }}"--}}
{{--                                                  placeholder="{{ __('messages.web_contact.type_your_message') }}"></textarea>--}}
{{--                                        <div class="help-block with-errors"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @if(getSettingForReCaptcha($userName))--}}
{{--                                    <div class="form-group col-xl-12 mt-2">--}}
{{--                                        @if(config('app.recaptcha.key'))--}}
{{--                                            <div class="g-recaptcha" data-sitekey="{{config('app.recaptcha.key')}}">--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <button type="submit" id="btnContact"--}}
{{--                                        class="default-btn">{{ __('messages.web_contact.send_message') }}</button>--}}
{{--                                <div id="msgSubmit" class="h3 text-center hidden"></div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </form>--}}
                            <form class="contact-form" method="POST" id="enquiryCreateForm">
                                @csrf
                                @method('POST')
                                @include('flash::message')
                                <div class="ajax-message"></div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="hospital_username" value="{{ request()->segment(2) }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form__input-block">
                                            <input name="full_name" id="full_name" type="text" class="form-control"
                                                   data-error="Please enter your name"
                                                   placeholder="{{ __('messages.web_contact.enter_your_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form__input-block">
                                            <input name="email" id="email" type="email" class="form-control"
                                                   placeholder="{{ __('messages.web_contact.enter_your_email') }}"
                                                   data-error="{{ __('messages.web_contact.enter_your_email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form__input-block">
                                            <input type="tel"
                                                   class="form-control phoneNumber {{ $errors->has('contact_no')?'is-invalid':'' }}"
                                                   id="phoneNumber" name="contact_no" value="{{ old('contact_no') }}"
                                                   placeholder="{{ __('messages.web_contact.contact_no') }}" required
                                                   data-error="{{ __('messages.web_contact.please_enter_your_phone_number') }}"
                                                   onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'>
                                            <div class="help-block with-errors"></div>
                                            {{ Form::hidden('prefix_code',null,['id'=>'prefix_code']) }}
                                            <span class="text-green d-none fw-400 fs-small mt-2 valid-msg">✓ &nbsp; Valid</span>
                                            <span class="text-danger d-none fw-400 fs-small mt-2 error-msg"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form__input-block">
                                            <select name="type" class="contactUsGeneral" id="contactUsGeneral">
                                                <option value="1">{{ \App\Models\Enquiry::TYPE_GENERAL }}</option>
                                                <option value="2">{{ \App\Models\Enquiry::TYPE_FEEDBACK }}</option>
                                                <option value="3">{{ \App\Models\Enquiry::TYPE_RESIDENTIAL }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form__input-block">
                                            <textarea name="message" id="message" rows="4"
                                                      class="form-control form-textarea"
                                                      placeholder="{{ __('messages.web_contact.type_your_message') }}"
                                                      required
                                                      data-error="{{ __('messages.web_contact.write_your_message') }}"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{config('app.recaptcha.key')}}" id="adminRecaptcha">
                                    @if(getSettingForReCaptcha($userName))
                                        <div class="form-group col-xl-12 mt-2">
                                            @if(config('app.recaptcha.key'))
                                                <div class="g-recaptcha" id="g-recaptcha" data-sitekey="{{config('app.recaptcha.key')}}">
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="col-lg-12 text-center mt-4">
                                        <button type="submit" id="btnContact"
                                                class="btn btn-primary">{{ __('messages.web_contact.send_message') }}
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::hidden('isEdit', false, ['class' => 'isEdit']) }}
            {{ Form::hidden('utilsScript', asset('assets/js/int-tel/js/utils.min.js'), ['class' => 'utilsScript']) }}
            {{ Form::hidden('enquiryURl', route('send.enquiry', getUser()->username), ['class' => 'enquiryURl']) }}
            @if(getSettingForReCaptcha($userName))
                {{ Form::hidden('isGoogleCaptchaEnabled', getSettingForReCaptcha($userName), ['class' => 'isGoogleCaptchaEnabled']) }}
            @endif
        </section>
            

@endsection
{{--        @section('page_scripts')--}}
{{--            @if(getSettingForReCaptcha($userName))--}}
{{--                <script src='https://www.google.com/recaptcha/api.js'></script>--}}
{{--            @endif--}}
{{--        @endsection--}}
