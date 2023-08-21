@extends('layouts.app')
@section('title')
    {{ __('messages.notice_board.details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.notice_board.details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary me-2 notice-edit-btn"
                   data-id="{{ $noticeBoard->id }}">{{ __('messages.common.edit') }}</a>
                <a href="javascript:history.back(-1);"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                    {{Form::hidden('noticeBoardUrl',url('notice-boards'),['class'=>'indexNoticeBoardUrl'])}}
                </div>
            </div>
            @include('notice_boards.show_fields')
        </div>
    </div>
    @include('notice_boards.edit_modal')
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let noticeBoardUrl = "{{url('notice-boards')}}";--}}
{{--    <script src="{{ mix('assets/js/notice_boards/create-details-edit.js') }}"></script>--}}
