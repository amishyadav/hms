@extends('layouts.app')
@section('title')
    {{ __('messages.notice_boards') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <livewire:notice-board-table/>
        </div>
        {{Form::hidden('noticeBoardUrl',url('employee/notice-board'),['id'=>'indexNoticeBoardUrl'])}}
        {{Form::hidden('noticeBoardShowUrl',url('employee/notice-board'),['id'=>'employeeNoticeBoardShowUrl'])}}
    </div>
@endsection
{{--let noticeBoardUrl = "{{url('employee/notice-board')}}";--}}
{{--let noticeBoardShowUrl = "{{url('employee/notice-board')}}";--}}
{{--    <script src="{{ mix('assets/js/employee/notice_boards.js') }}"></script>--}}
