@extends('layouts.app')
@section('title')
    {{__('messages.sms.sms')}}
@endsection
@section('page_css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}"/>--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <livewire:sms-table/>
            {{Form::hidden('smsUrl',url('sms'),['id'=>'smsUrl'])}}
            {{Form::hidden('createSmsUrl',route('sms.store'),['id'=>'createSmsUrl'])}}
            {{Form::hidden('getUsersListUrl',route('sms.users.lists'),['id'=>'getUsersListUrl'])}}
            {{Form::hidden('utilsScript',asset('assets/js/int-tel/js/utils.min.js'),['class'=>'utilsScript'])}}
            {{Form::hidden('phoneNo',old('prefix_code').old('phone'),['class'=>'phoneNo'])}}
            {{Form::hidden('isEdit',true,['class'=>'isEdit'])}}
            {{ Form::hidden('smsLang',__('messages.delete.sms'), ['id' => 'smsLang']) }}
            @include('sms.templates.templates')
            @include('sms.create_modal')
            @include('sms.show_modal')
        </div>
    </div>
@endsection
{{--let smsUrl = "{{url('sms')}}"--}}
{{--let createSmsUrl = "{{route('sms.store')}}"--}}
{{--let getUsersListUrl = "{{ route('sms.users.lists') }}"--}}
{{--let isEdit = true--}}
{{--let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}"--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/sms/sms.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}
