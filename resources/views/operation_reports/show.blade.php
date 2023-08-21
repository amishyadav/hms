@extends('layouts.app')
@section('title')
    {{ __('messages.operation_report.operation_report_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">{{__('messages.operation_report.operation_report_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a data-id="{{ $operationReport->id }}"
                   class="btn btn-primary me-4 edit-btn">{{ __('messages.common.edit') }}</a>
                <a href="{{route('birth-reports.index')}}"
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
                {{Form::hidden('operationReportUrl',url('operation-reports'),['id'=>'indexOperationReportUrl'])}}
                <div class="card-body">
                    @include('operation_reports.show_fields')
                    @include('operation_reports.edit_modal')
                    {{Form::hidden('operationReportShowUrl',url('operation-reports'),['id'=>'operationReportShowUrl'])}}
                    {{Form::hidden('operationReportUrl',url('operation-reports'),['id'=>'operationReportUrl'])}}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let operationReportUrl = "{{url('operation-reports')}}";--}}
{{--    <script src="{{ mix('assets/js/operation_reports/create-details-edit.js') }}"></script>--}}
