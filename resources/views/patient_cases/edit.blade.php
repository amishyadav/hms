@extends('layouts.app')
@section('title')
    {{ __('messages.case.edit_case') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('patient-cases.index') }}"
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
                <div class="card-body p-12">
                    {{ Form::model($patientCase, ['route' => ['patient-cases.update', $patientCase->id], 'method' => 'patch', 'id' => 'editPatientCaseForm']) }}

                    @include('patient_cases.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";--}}
{{--        let isEdit = true;--}}
{{--    <script src="{{ mix('assets/js/patient_cases/create-edit.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/phone-number-country-code.js') }}"></script>--}}
