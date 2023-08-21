@extends('layouts.app')
@section('title')
    {{ __('messages.mail') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'mail.send', 'files' => 'true']) }}
                @include('mail.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
{{--        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--    <script src="{{ mix('assets/js/mail/mail.js') }}"></script>--}}
