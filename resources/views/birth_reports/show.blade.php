@extends('layouts.app')
@section('title')
    {{ __('messages.birth_report.birth_report_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{ __('messages.birth_report.birth_report_details') }}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a data-id="{{ $birthReport->id }}"
                   class="btn btn-primary me-2 me-2 edit-btn">{{ __('messages.common.edit') }}</a>
                <a href="{{route('birth-reports.index')}}"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <div class="card">
                {{Form::hidden('birthReportUrl',url('birth-reports'),['class'=>'birthReportUrl'])}}
                <div class="card-body">
                    @include('birth_reports.show_fields')
                    @include('birth_reports.edit_modal')
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let birthReportUrl = "{{ url('birth-reports') }}"--}}
{{--    <script src="{{ mix('assets/js/birth_reports/create-details-edit.js') }}"></script>--}}
