@extends('layouts.app')
@section('title')
    {{ __('messages.ambulance.edit_ambulance') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('ambulances.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                {{Form::hidden('utilsScript',asset('assets/js/int-tel/js/utils.min.js'),['class'=>'utilsScript'])}}
                {{Form::hidden('isEdit',true,['class'=>'isEdit'])}}
                <div class="card-body">
                    {{ Form::model($ambulance, ['route' => ['ambulances.update', $ambulance->id], 'method' => 'patch', 'id' => 'editAmbulanceForm']) }}

                    @include('ambulances.edit_fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";--}}
{{--        let isEdit = true;--}}
{{--    <script src="{{ mix('assets/js/ambulances/create-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}
