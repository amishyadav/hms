@extends('layouts.app')
@section('title')
    {{ __('messages.call_logs') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
@endsection
@section('css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:call-log-table/>
            {{ Form::hidden('callLogUrl', route('call_logs.index'), ['class' => 'callLogUrl']) }}
            {{ Form::hidden('utilsScript', asset('assets/js/int-tel/js/utils.min.js'), ['class' => 'utilsScript']) }}
            {{ Form::hidden('incoming', __('messages.call_log.incoming'), ['id' => 'incoming']) }}
            {{ Form::hidden('outgoing', __('messages.call_log.outgoing'), ['id' => 'outgoing']) }}
            {{ Form::hidden('callTypeIncoming', \App\Models\CallLog::INCOMING, ['id' => 'callTypeIncoming']) }}
            {{ Form::hidden('callLogLang', __('messages.delete.call_log'), ['id' => 'callLogLang']) }}
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--let callLogUrl = "{{ route('call_logs.index') }}/";--}}
{{--let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";--}}
{{--let incoming = "{{ __('messages.call_log.incoming') }}";--}}
{{--let outgoing = "{{ __('messages.call_log.outgoing') }}";--}}
{{--let callTypeIncoming = "{{\App\Models\CallLog::INCOMING}}";--}}
{{--let isEdit = true;--}}
{{--    <script src="{{mix('assets/js/call_logs/call_log.js')}}"></script>--}}
