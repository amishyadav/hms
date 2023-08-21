<!-- Start Navbar Area -->
@php
    $user = getUser();
    $hospitalSettingValue = getSettingValue();
@endphp

<header class="position-relative">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-1 col-4">
                <a href="{{ url('/') }}" data-turbo="false" class="header-logo">
                    <img src="{{ asset($hospitalSettingValue['app_logo']['value']) }}" alt="Infy HMS"
                         class="img-fluid"/>
                </a>
            </div>
            <div class="col-lg-11 col-8">
                <nav class="navbar navbar-expand-xl navbar-light justify-content-end py-0">
                    <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav align-items-center py-2 py-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'front' ? 'active' : '' }}"
                                   aria-current="page" href="{{ route('front', $user->username) }}">
                                    {{ __('messages.web_home.home') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'our-services' ? 'active' : '' }}"
                                   aria-current="page" href="{{route('our-services', $user->username) }}">
                                    {{ __('messages.web_home.services') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'our-doctors' ? 'active' : '' }}"
                                   aria-current="page" href="{{ route('our-doctors', $user->username) }}">
                                    {{ __('messages.web_home.doctors') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'aboutUs' ? 'active' : '' }}"
                                   aria-current="page" href="{{ route('aboutUs', $user->username) }}">
                                    {{ __('messages.web_menu.about') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"
                                   aria-current="page" href="{{ route('contact', $user->username) }}">
                                    {{ __('messages.web_home.contact') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" {{ Request::is('terms-of-service', 'privacy-policy') ? 'active' : '' }}>
                                    {{ __('messages.web_menu.our_features') }}
                                    <i class="fa-solid fa-angle-down ms-1"></i>
                                </a>
                                <ul class="nav submenu">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('appointment') ? 'active' : '' }}" href="{{ route('appointment', $user->username) }}">
                                            {{ __('messages.web_menu.appointment') }}
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link {{ Route::is('working-hours') ? 'active' : '' }}" href="{{ route('working-hours', $user->username) }}">
                                            {{ __('messages.web_menu.working_hours') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('testimonials') ? 'active' : '' }}" href="{{ route('testimonials', $user->username) }}">
                                            {{ __('messages.web_home.testimonials') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('terms-of-service') ? 'active' : '' }}" href="{{ route('terms-of-service', $user->username) }}">
                                            {{ __('messages.web_home.terms_of_service') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('privacy-policy') ? 'active' : '' }}" href="{{ route('privacy-policy', $user->username) }}">
                                            {{ __('messages.web_home.privacy_policy') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"> {{ __('messages.language.'.getCurrentLanguageName()) }}</a>
                                <ul class="nav submenu language-menu">
                                    @foreach(getLanguages() as $key => $value)
                                        @foreach(\App\Models\User::LANGUAGES_IMAGE as $imageKey=> $imageValue)
                                            @if($imageKey == $key)
                                                <li class="nav-item languageSelection" data-prefix-value="{{ $key }}">
                                                    <a href="javascript:void(0)"
                                                       class="nav-link d-flex align-items-center">
                                                        <img class="me-2 country-flag"
                                                             src="{{asset($imageValue)}}"/>
                                                        {{ $value }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <div class="text-xl-end header-btn-grp ms-xl-3">
                            @if(Auth::user())
                                @role('Admin')
                                <a href="{{ route('dashboard') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Patient')
                                <a href="{{ url('patient/my-cases') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Doctor')
                                <a href="{{ url('employee/doctor') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Nurse')
                                <a href="{{ url('bed-types') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Receptionist')
                                <a href="{{  url('appointments') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Pharmacist')
                                <a href="{{ url('employee/doctor') }}" data-turbo="false" class="default-btn"
                                   data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Accountant')
                                <a href="{{ url('accounts') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Case Manager')
                                <a href="{{ url('employee/doctor') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                                @role('Lab Technician')
                                <a href="{{ url('employee/doctor') }}" data-turbo="false"
                                   class="btn btn-success me-2 mb-3 mb-xl-0" data-turbo="false">
                                    {{ __('messages.dashboard.dashboard') }}
                                </a>
                                @endrole
                            @else
                                <a href="{{ route('login') }}" data-turbo="false"
                                   class="btn btn-success btn-sm me-xxl-3 me-2 mb-3 rounded-2 mb-xl-0"
                                   data-turbo="false">
                                    {{ __('messages.web_menu.login') }}
                                </a>
                            @endif
                            <a href="{{ route('appointment', $user->username) }}"
                               class="btn btn-primary btn-sm mb-3 rounded-2 mb-xl-0">
                                {{ __('messages.web_home.book_appointment') }}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
