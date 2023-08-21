@php
    $style = 'style=background-image:url('.asset('assets/img/progress-hd.png').')';
    $hospitalSettingValue = getSettingValue();
    App::setLocale(session('languageName'));
@endphp
@extends('layouts.auth_app')    
@section('title')
    {{  __('auth.reset_password.password_reset') }}
@endsection
@section('content')
    @include('flash::message')
    @php
        $style = 'style=background-image:url('.asset('assets/img/progress-hd.png').')';
        $hospitalSettingValue = getSuperAdminSettingValue();
        App::setLocale(session('languageName'));

    @endphp
    <!--begin::Authentication - Password reset -->
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
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="text-center mb-2">{{__('auth.login.forgot_password')}} ?</h1>
            <div class="text-center text-gray-400 fw-bold fs-5 mb-5">{{__('auth.forgot_password.title')}}</div>
            <form method="post" action="{{ url('/password/email') }}">
                @csrf
                <div class="mb-sm-7 mb-4">
                    <label for="formEmailInput" class="form-label">
                        {{__('auth.email')}}
                        <span class="required"></span>
                    </label>
                    <input type="email" class="form-control" name="email" id="formEmailInput"
                           value="{{ old('email') }}"
                           placeholder="{{__('auth.forgot_password.enter_email')}}" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">{{__('auth.forgot_password.send_pwd_reset')}}</button>
                </div>
            </form>
        </div>
    </div>
    <!--end::Authentication - Password reset-->
@endsection
