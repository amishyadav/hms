@extends('layouts.app')
@section('title')
    {{ __('messages.case.case_details') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">{{__('messages.case.case_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                @if (!Auth::user()->hasRole('Doctor|Nurse'))
                    <a href="{{route('patient-cases.edit',['patient_case' => $patientCase->id])}}"
                       class="btn btn-primary me-4">{{ __('messages.common.edit') }}</a>
                @endif
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <div class="card">
                <div class="card-body">
                    {{Form::hidden('bedUrl',url('beds'),['class'=>'showBedUrl'])}}
                    @include('patient_cases.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let bedUrl = "{{url('beds')}}"--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/beds/beds-details-edit.js') }}"></script>--}}
