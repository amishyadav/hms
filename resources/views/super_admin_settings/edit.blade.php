@extends('layouts.app')
@section('title')
    {{ __('messages.settings') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                    @include('flash::message')
                </div>
            </div>
            @yield('section')
        </div>
        {{ Form::hidden('imageValidation', __('messages.setting.image_validation'), ['id' => 'settingImageValidation']) }}
    </div>
@endsection
{{--        let imageValidation = '{{  __('messages.setting.image_validation') }}'--}}
{{--    <script src="{{ mix('assets/js/super_admin_settings/setting.js') }}"></script>--}}
