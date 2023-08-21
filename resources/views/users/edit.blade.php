@extends('layouts.app')
@section('title')
    {{ __('messages.user.edit_user') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('users.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::model($user, ['route' => ['users.update', $user->id], 'files' => 'true', 'method' => 'patch', 'id' => 'editUserForm']) }}
                    @include('users.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let userUrl = "{{ route('users.index') }}";--}}
{{--        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";--}}
{{--        let phoneNo = "{{ old('prefix_code').old('phone') }}";--}}
{{--        let defaultAvatarImageUrl = "{{ asset('assets/img/avatar.png') }}";--}}
{{--        let isEdit = true;--}}
{{--    <script src="{{ mix('assets/js/users/create-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}
