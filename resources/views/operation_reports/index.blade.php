@extends('layouts.app')
@section('title')
    {{ __('messages.operation_report.operation_reports') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('operationReportUrl',url('operation-reports'),['id'=>'operationReportUrl'])}}
            {{Form::hidden('operationReportCreateUrl',route('operation-reports.store'),['id'=>'operationReportCreateUrl'])}}
            {{ Form::hidden('operationReportLang',__('messages.delete.operation_report'), ['id' => 'operationReportLang']) }}
            <livewire:operation-table/>
            @include('operation_reports.templates.templates')
            @include('operation_reports.create_modal')
            @include('operation_reports.edit_modal')
        </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let operationReportUrl = "{{url('operation-reports')}}"--}}
{{--        let operationReportCreateUrl = "{{route('operation-reports.store')}}";--}}
{{--        let patientUrl = "{{ url('patients') }}";--}}
{{--        let doctorUrl = "{{ url('doctors') }}";--}}
{{--        let caseUrl = "{{ url('patient-cases') }}";--}}
{{--    <script src="{{ mix('assets/js/operation_reports/operation_reports.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/operation_reports/create-edit.js') }}"></script>--}}
