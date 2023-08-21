@extends('layouts.app')
@section('title')
    {{ __('messages.settings') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('page_css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::hidden('utilsScript', asset('assets/js/int-tel/js/utils.min.js'), ['class' => 'utilsScript']) }}
                    {{ Form::hidden('isEdit', true, ['class' => 'isEdit']) }}
                    {{ Form::hidden('phoneNo', old('prefix_code').old('phone'), ['id' => 'footerSettingPhoneNumber']) }}
                    {{ Form::open(['route' => 'super.admin.footer.settings.update','method'=>'POST', 'id'=>'superAdminFooterSettingForm']) }}
                    @include('super_admin_footer_settings.field')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}"--}}
{{--        let isEdit = true;--}}
{{--        let phoneNo = "{{ old('prefix_code').old('phone') }}";--}}
{{--    <script src="{{ mix('assets/js/super_admin_settings/setting.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}
