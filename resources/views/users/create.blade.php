@extends('layouts.app')
@section('title')
    {{ __('messages.user.new_user') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            {{Form::hidden('userCurrentLanguage',getLoggedInUser()->language,['class'=>'userCurrentLanguage'])}}
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
                    {{Form::hidden('user_url',route('users.index'),['id'=>'createUserUrl'])}}
                    {{Form::hidden('utilsScript',asset('assets/js/int-tel/js/utils.min.js'),['class'=>'utilsScript'])}}
                    {{Form::hidden('phoneNo',old('prefix_code').old('phone'),['class'=>'phoneNo'])}}
                    {{Form::hidden('defaultAvatarImageUrl',asset('assets/img/avatar.png'),['class'=>'defaultAvatarImageUrl'])}}
                    {{Form::hidden('isEdit',false,['class'=>'isEdit'])}}
                    {{Form::hidden('downloadDocument_url',url('visitor-download'),['id'=>'userDownloadDocumentUrl'])}}
                    {{Form::hidden('doctorRole',array_search('Doctor', $role),['id'=>'userDoctorRole'])}}
                    {{ Form::open(['route' => ['users.index'], 'method'=>'post', 'files' => true, 'id' => 'createUserForm']) }}
                    @include('users.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--let userUrl = "{{ route('users.index') }}";--}}
{{--let downloadDocumentUrl = "{{ url('visitor-download') }}";--}}
{{--let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";--}}
{{--let defaultAvatarImageUrl = "{{ asset('assets/img/avatar.png') }}";--}}
{{--let phoneNo = "{{ old('prefix_code').old('phone') }}";--}}
{{--let isEdit = false;--}}
{{--let doctorRole = "{{ array_search('Doctor', $role) }}";--}}
{{--    <script src="{{ mix('assets/js/users/create-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}

