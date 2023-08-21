@extends('web.layouts.front')
@section('title')
    {{ __('messages.appointments') }}
@endsection
@section('page_css')
{{--    <link href="{{ mix('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link href="{{ mix('assets/css/selectize-input.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link rel="stylesheet" href="{{ mix('web_front/css/hospital-appointment.css') }}">--}}
@endsection
@routes
@section('content')
    @php
        $hospitalSettingValue = getSettingValue();
    @endphp

    <div class="appointment-page">
        <!-- start hero section -->
        <section class="hero-section position-relative p-t-60 border-bottom-right-rounded border-bottom-left-rounded bg-gray overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center">
                        <div class="hero-content">
                            <h1 class="mb-3 pb-1">
                                {{ __('messages.web_home.make_appointment') }}
                            </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-start justify-content-center mb-lg-0 mb-5">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('landing-home') }}">{{ __('messages.web_home.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ __('messages.web_home.make_appointment') }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <img src="{{ asset('web_front/images/page-banner/make-appointment.png') }}" alt="Infy Care" class="img-fluid" />
                    </div>
                </div>
            </div>
        </section><!-- end hero section -->

        <?php
        $userName = request()->segment(2);
        ?>
        <section class="appointment-section p-t-120 position-relative">
            <div class="container">
                {{ Form::open(['id' => 'appointmentForm','class'=>'appointment-form']) }}
                <input type="hidden" name="hospital_username" value="{{ request()->segment(2) }}">
                    @include('web.home.appointment_fields')
                {{ Form::close() }}
            </div>
        </section>
        <!-- start contact section -->
        <section class="contact-details-section p-t-120 p-b-120">
            <div class="container">
                <div class="row mt-xl-5">
                    <div class="col-lg-6">
                        <div class="text-lg-start text-center mb-lg-0 mb-5">
                            <h2 class="mb-3">{{ getFrontSettingValue(\App\Models\FrontSetting::APPOINTMENT,'appointment_title') }}</h2>
                            <p class="mb-0">
                                {!! getFrontSettingValue(\App\Models\FrontSetting::APPOINTMENT,'appointment_description') !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6 contact-details-block d-flex align-items-stretch">
                                <div class="card text-center mx-xl-2 flex-fill">
                                    <div class="icon-details-box d-flex align-items-center justify-content-center mx-auto">
                                        <i class="fa-solid fa-phone fs-3"></i>
                                    </div>
                                    <div class="card-body text-center d-flex flex-column pb-4">
                                        <a href="tel:{{ $hospitalSettingValue['hospital_phone']['value'] }}" class="text-decoration-none fs-5 text-success my-2">
                                            {{ $hospitalSettingValue['hospital_phone']['value'] }}
                                        </a>
                                        <span class="text-secondary fw-light">
                                            {{ __('messages.web_appointment.call_now_and_get_a_free_consulting') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 contact-details-block d-flex align-items-stretch">
                                <div class="card text-center mx-xl-2 flex-fill">
                                    <div class="icon-details-box d-flex align-items-center justify-content-center mx-auto">
                                        <i class="fa-solid fa-envelope fs-3"></i>
                                    </div>
                                    <div class="card-body text-center d-flex flex-column pb-4">
                                        <a href="mailto:{{ $hospitalSettingValue['hospital_email']['value'] }}"
                                           class="text-decoration-none fs-5 text-success my-2">
                                            {{$hospitalSettingValue['hospital_email']['value'] }}
                                        </a>
                                        <span class="text-secondary fw-light">Contact Hospital</span>
                                    </div>
                                </div>
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
        @include('appointments.templates.appointment_slot')
        {{ Form::hidden('doctorDepartmentUrl', route('appointment.doctor.list'), ['class' => 'doctorDepartmentUrl']) }}
        {{ Form::hidden('doctorUrl', route('appointment.doctors.list'), ['class' => 'doctorUrl']) }}
        {{ Form::hidden('appointmentSaveUrl', route('web.appointments.store'), ['class' => 'appointmentSaveUrl']) }}
        {{ Form::hidden('doctorScheduleList', url('appointment-doctor-schedule-list'), ['class' => 'doctorScheduleList']) }}
        {{ Form::hidden('isEdit', false, ['class' => 'isEdit']) }}
        {{ Form::hidden('isCreate', true, ['class' => 'isCreate']) }}
        {{ Form::hidden('getBookingSlot', route('appointment.get.booking.slot'), ['class' => 'getBookingSlot']) }}
        @if(getSettingForReCaptcha($userName))
            {{ Form::hidden('isGoogleCaptchaEnabled', getSettingForReCaptcha($userName), ['class' => 'isGoogleCaptchaEnabled']) }}
        @endif
    </div>

    <!-- End Appointment Form Area -->
@endsection
{{--@section('page_scripts')--}}
{{--@if(getSettingForReCaptcha($userName))--}}
{{--    <script src='https://www.google.com/recaptcha/api.js'></script>--}}
{{--@endif--}}
{{--@endsection--}}
