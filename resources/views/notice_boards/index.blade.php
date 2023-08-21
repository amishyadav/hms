@extends('layouts.app')
@section('title')
    {{ __('messages.notice_boards') }}
@endsection
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{Form::hidden('noticeBoardUrl',url('notice-boards'),['class'=>'indexNoticeBoardUrl'])}}
            {{Form::hidden('noticeBoardCreateUrl',route('notice-boards.store'),['id'=>'indexNoticeBoardCreateUrl'])}}
            {{ Form::hidden('noticeBoardLang',__('messages.delete.notice_board'), ['id' => 'noticeBoardLang']) }}
            <livewire:notice-board-table/>
            @include('notice_boards.create_modal')
            @include('notice_boards.edit_modal')
            @include('notice_boards.templates.templates')
        </div>
    </div>
@endsection
{{--        let noticeBoardUrl = "{{url('notice-boards')}}";--}}
{{--        let noticeBoardCreateUrl = "{{route('notice-boards.store')}}";--}}
{{--    <script src="{{ mix('assets/js/notice_boards/notice_boards.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/notice_boards/create-edit.js') }}"></script>--}}
