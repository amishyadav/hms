@extends('layouts.app')
@section('title')
    {{ __('messages.front_settings') }}
@endsection
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <div>
                        <span class="text-dark">{{  $errors->first() }}</span>
                    </div>
                </div>
            @endif
            @include('front_settings.setting_menu')
            @yield('section')
            {{Form::hidden('isEdit',true,['class'=>'isEdit'])}}
            {{Form::hidden('moduleUrl',route('module.index'),['id'=>'frontModuleUrl'])}}
            {{Form::hidden('imageValidation',__('messages.setting.image_validation'),['id'=>'frontSettingImageValidation'])}}
            {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'frontSettingDefaultDocumentImageUrl'])}}
        </div>
    </div>
@endsection
{{--        let isEdit = true;--}}
{{--        let moduleUrl = '{{ route('module.index') }}';--}}
{{--        let imageValidation = '{{  __('messages.setting.image_validation') }}';--}}
{{--        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--    <script src="{{ mix('assets/js/front_settings/front_settings.js') }}"></script>--}}
