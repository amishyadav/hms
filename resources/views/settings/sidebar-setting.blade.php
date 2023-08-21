@extends('settings.edit')
@section('title')
    {{ __('messages.sidebar_setting') }}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center py-1">
            </div>
            <livewire:sidebar-setting-table/>
            @include('settings.templates.templates')
            {{ Form::hidden('moduleUrl', route('module.index'), ['id' => 'moduleURL']) }}
        </div>
    </div>
@endsection
{{--        let isEdit = true;--}}
{{--        let moduleUrl = '{{ route('module.index') }}';--}}
{{--        let searchExist = true;--}}
{{--    <script src="{{ mix('assets/js/settings/setting.js') }}"></script>--}}
