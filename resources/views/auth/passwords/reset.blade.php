@php
    $style = 'style=background-image:url('.asset('assets/img/progress-hd.png').')';
    $hospitalSettingValue = getSuperAdminSettingValue();
    App::setLocale(session('languageName'));
@endphp

@extends('layouts.auth_app')
@section('title')
    {{  __('auth.reset_password.password_reset') }}
@endsection
@section('content')
    <!--begin::Authentication - New password -->
    @php
        $style = 'style=background-image:url('.asset('assets/img/progress-hd.png').')';
        App::setLocale(session('languageName'));

    @endphp
    <div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center p-4">
        <div class="col-12 text-center">
            <a href="{{ route('landing-home') }}" class="image mb-7 mb-sm-10">
                <img alt="Logo" src="{{ asset($hospitalSettingValue['favicon']['value']) }}" class="img-fluid logo-fix-size">
            </a>
        </div>
        <div class="bg-theme-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <h1 class="text-center mb-2">{{__('auth.reset_password.title')}}</h1>
                <div class="text-center text-gray-400 fw-bold fs-5 mb-5">{{__('auth.reset_password.already_reset')}}
                    <a href="{{ route('login') }}" class="link-primary fw-bolder">{{__('auth.sign_in')}}</a></div>
            <form method="post" action="{{ url('/password/reset') }}">
                @csrf
                <input type="hidden" name="token" value="{{$token}}">

                <div class="mb-sm-7 mb-4">
                    <label class="form-label" for="formEmailInput">
                        {{__('auth.email')}}
                        <span class="required"></span>
                    </label>
                    <input type="email" class="form-control" name="email" id="formEmailInput"
                           value="{{ old('email') }}" placeholder="{{__('auth.login.enter_email')}}" required>
                </div>
                <div class="mb-sm-7 mb-4">
                    <label class="form-label" for="formPasswordInput">
                        {{__('auth.password')}}
                        <span class="required"></span>
                    </label>
                    <input type="password" class="form-control" name="password" id="formPasswordInput"
                           placeholder="{{__('auth.login.enter_password')}}" required>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label" for="formConPasswordInput">
                        {{__('auth.confirm_password')}}
                        <span class="required"></span>
                    </label>
                    <input type="password" name="password_confirmation"
                           class="form-control" id="formConPasswordInput"
                           placeholder="{{__('auth.registration.enter_confirm_password')}}" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">{{__('auth.reset_password.reset_pwd_btn')}}</button>
                </div>
            </form>
        </div>
    </div>
    <!--end::Authentication - New password-->
@endsection
