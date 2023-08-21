@php
    $settingValue = getSuperAdminSettingValue();
@endphp

<footer class="footer bg-secondary">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-7 mb-md-0 mb-3">
                <div class="footer-logo">
                    <img src="{{ $settingValue['app_logo']['value'] }}" alt="HMS-Sass" class="img-fluid"
                         id="footer-logo-white-img"/>
                </div>
                <p class="d-block text-white mt-4">
                    {!! $settingValue['footer_text']['value'] !!}
                </p>
            </div>
            <div class="col-lg-2 col-md-3 mb-3">
                <h3 class="mb-3 text-white">{{__('messages.landing.usefull_link')}}</h3>
                <ul class="ps-0">
                    <li>
                        <a href="{{ route('landing-home') }}"
                           class="text-decoration-none mb-3 d-block text-white {{ Request::is('/') ? 'footer-link-active' : '' }}">{{ __('messages.landing.home') }}</a>
                    </li>
                    @if(getLoggedInUser() == null || !getLoggedInUser()->hasRole('Super Admin'))
                        <li>
                            <a href="{{ route('landing.pricing') }}"
                               class="text-decoration-none mb-3 d-block text-white {{ Request::is('pricing') ? 'footer-link-active' : '' }}">{{ __('messages.landing.pricing') }}
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('landing.contact.us') }}"
                           class="text-decoration-none mb-3 d-block text-white {{ Request::is('contact-us') ? 'footer-link-active' : '' }}">{{ __('messages.enquiry.contact') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('landing.faq') }}"
                           class="text-decoration-none mb-3 d-block text-white {{ Request::is('faqs') ? 'footer-link-active' : '' }}">{{ __('messages.landing.faqs') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('landing.about.us') }}"
                           class="text-decoration-none mb-3 d-block text-white {{ Request::is('about-us') ? 'footer-link-active' : '' }}">{{ __('messages.landing.about') }}
                    </li>
                    <li>
                        <a href="{{ route('landing.services') }}"
                           class="text-decoration-none mb-3 d-block text-white {{ Request::is('our-services') ? 'footer-link-active' : '' }}">{{ __('messages.services') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-12">
                <h3 class="mb-3 text-white">{{ __('messages.landing.get_in_touch') }}</h3>
                <div class="footer-info">
                    <div class="d-flex align-items-center footer-info__block mb-3">
                        <i class="fa-solid fa-location-dot me-3 text-primary"></i>
                        <p class="text-white mb-0">
                            {{ $settingValue['address']['value'] }}
                        </p>
                    </div>
                    <div class="d-flex align-items-center footer-info__block mb-3">
                        <i class="fa-solid fa-at  me-3 text-primary"></i>
                        <a href="mailto:{{ $settingValue['email']['value'] }}" class="text-decoration-none text-white">
                            {{ $settingValue['email']['value'] }}
                        </a>
                    </div>
                    <div class="d-flex align-items-center footer-info__block mb-3">
                        <i class="fa-solid fa-phone text-primary me-3"></i>
                        <a href="tel:{{ $settingValue['phone']['value'] }}" class="text-decoration-none text-white">
                            {{ $settingValue['phone']['value'] }}
                        </a>
                    </div>
                    <div class="social-icon d-flex mt-lg-4">
                        @if(!empty($settingValue['facebook_url']['value']))
                            <a href="{{ $settingValue['facebook_url']['value'] }}" target="_blank"><i
                                        class="fa-brands fa-facebook-f me-3 d-flex align-items-center justify-content-center text-white"></i></a>
                        @endif
                        @if(!empty($settingValue['instagram_url']['value']))
                            <a href="{{ $settingValue['instagram_url']['value'] }}" target="_blank"><i
                                        class="fa-brands fa-instagram me-3 d-flex align-items-center justify-content-center text-white"></i></a>
                        @endif
                        @if(!empty($settingValue['twitter_url']['value']))
                            <a href="{{ $settingValue['twitter_url']['value'] }}" target="_blank"><i
                                        class="fa-brands fa-twitter me-3 d-flex align-items-center justify-content-center text-white"></i></a>
                        @endif
                        @if(!empty($settingValue['linkedin_url']['value']))
                            <a href="{{ $settingValue['linkedin_url']['value'] }}" target="_blank"><i
                                        class="fa-brands fa-linkedin-in me-3 d-flex align-items-center justify-content-center text-white"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-lg-5 mt-4  copy-right">
                <p class=" pt-4 pb-4 mb-0 text-white">{{ __('messages.web_menu.copyright') }} © {{ date('Y') }}
                    <b>{{ $settingValue['app_name']['value'] }}</b> | {{__('messages.landing.all_rights_reserved')}}</p>
            </div>

        </div>
    </div>
</footer>

{{--<footer class="footer theme-bg">--}}
{{--    <div class="primary-footer">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center text-center">--}}
{{--                <div class="col-lg-8 col-md-12">--}}
{{--                    <div>--}}
{{--                        <h2 class="title">{{ __('messages.landing.subscribe_our_newsletter') }}</h2>--}}
{{--                        <div class="title-bdr">--}}
{{--                            <div class="left-bdr"></div>--}}
{{--                            <div class="right-bdr"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row text-center mb-4">--}}
{{--                <div class="col-lg-8 col-md-10 mx-auto">--}}
{{--                    <div class="ajax-message"></div>--}}
{{--                    <div class="subscribe-form">--}}
{{--                        <form id="mc-form" class="group d-md-flex align-items-center" method="POST">--}}
{{--                            @CSRF--}}
{{--                            <input type="email" value="" name="email" class="email" id="email"--}}
{{--                                   placeholder="Enter Email Address" required>--}}
{{--                            <button class="btn btn-theme" type="submit" id="subscribeBtn">--}}
{{--                                <span>{{__('messages.landing.subscribe')}}</span>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="footer-logo mb-3">--}}
{{--                        <img id="footer-logo-white-img" src="{{ $settingValue['app_logo']['value'] }}"--}}
{{--                             class="img-fluid" alt="">--}}
{{--                    </div>--}}
{{--                    <p class="mb-0">{!! $settingValue['footer_text']['value'] !!}</p>--}}

{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">--}}
{{--                    <h4 class="mb-4 text-white">{{__('messages.landing.usefull_link')}}</h4>--}}
{{--                    <div class="footer-list justify-content-between d-flex">--}}
{{--                        <ul class="list-unstyled w-100">--}}
{{--                            <li><a href="{{ route('landing.home') }}">{{ __('messages.landing.home') }}</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="{{ route('landing.about.us') }}">{{ __('messages.landing.about') }}</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="{{ route('landing.services') }}">{{ __('messages.services') }}</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <ul class="list-unstyled w-100">--}}
{{--                            @if(getLoggedInUser() == null || !getLoggedInUser()->hasRole('Super Admin'))--}}
{{--                                <li><a href="{{ route('landing.pricing') }}">{{ __('messages.landing.pricing') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            <li><a href="{{ route('landing.contact.us') }}">{{ __('messages.enquiry.contact') }}</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="{{ route('landing.faq') }}">{{ __('messages.landing.faqs') }}</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">--}}
{{--                    <div class="footer-cntct">--}}
{{--                        <h4 class="mb-4 text-white">{{ __('messages.landing.get_in_touch') }}</h4>--}}
{{--                        <ul class="media-icon list-unstyled">--}}
{{--                            <li>--}}
{{--                                <p class="mb-0"><i class="la la-map-o"></i>--}}
{{--                                    <b>{{ $settingValue['address']['value'] }}</b>--}}
{{--                                </p>--}}
{{--                            </li>--}}
{{--                            <li><i class="la la-envelope-o"></i> <a--}}
{{--                                        href="mailto:{{ $settingValue['email']['value'] }}"><b>{{ $settingValue['email']['value'] }}</b></a>--}}
{{--                            </li>--}}
{{--                            <li><i class="la la-phone"></i> <a--}}
{{--                                        href="tel:{{ $settingValue['phone']['value'] }}"><b>{{ $settingValue['phone']['value'] }}</b></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="social-icons mt-3">--}}
{{--                            <ul class="list-inline">--}}
{{--                                <li class="{{ empty($settingValue['facebook_url']['value']) ? 'd-none' : ''}}"><a--}}
{{--                                            href="{{ $settingValue['facebook_url']['value'] }}" target="_blank"><i--}}
{{--                                                class="fab fa-facebook-f"></i></a>--}}
{{--                                </li>--}}
{{--                                <li class="{{ empty($settingValue['instagram_url']['value']) ? 'd-none' : ''}}"><a--}}
{{--                                            href="{{ $settingValue['instagram_url']['value'] }}"><i--}}
{{--                                                class="fab fa-instagram" target="_blank"></i></a>--}}
{{--                                </li>--}}
{{--                                <li class="{{ empty($settingValue['twitter_url']['value']) ? 'd-none' : ''}}"><a--}}
{{--                                            href="{{ $settingValue['twitter_url']['value'] }}"><i--}}
{{--                                                class="fab fa-twitter"--}}
{{--                                                target="_blank"></i></a>--}}
{{--                                </li>--}}
{{--                                <li class="{{ empty($settingValue['linkedin_url']['value']) ? 'd-none' : ''}}"><a--}}
{{--                                            href="{{ $settingValue['linkedin_url']['value'] }}"><i--}}
{{--                                                class="fab fa-linkedin-in" target="_blank"></i></a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="secondary-footer mt-5 text-center">--}}
{{--        <div class="container">--}}
{{--            <div class="copyright">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <span>--}}
{{--                            {{ __('messages.web_menu.copyright') }} © {{ date('Y') }} <b>{{ $settingValue['app_name']['value'] }}</b> | {{__('messages.landing.all_rights_reserved')}}--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
