@extends('layouts.app')
@section('title')
    {{ __('messages.users') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:user-table/>
            {{Form::hidden('user_url',route('users.index'),['id'=>'indexUserUrl'])}}
            {{ Form::hidden('userLang',__('messages.delete.user'), ['id' => 'userLang']) }}
            {{Form::hidden('isEdit',true,['class'=>'isEdit'])}}
        </div>
        @include('users.templates.templates')
        @include('users.show_modal')
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--let userUrl = "{{route('users.index')}}"--}}
{{--let userShowUrl = "{{route('users.show')}}"--}}
{{--        let isEdit = true--}}
{{--    <script src="{{mix('assets/js/users/user.js')}}"></script>--}}
