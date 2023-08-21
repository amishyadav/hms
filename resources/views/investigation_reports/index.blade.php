@extends('layouts.app')
@section('title')
    {{ __('messages.investigation_report.investigation_reports') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:investigation-table/>
            {{Form::hidden('investigationReportUrl',url('investigation-reports'),['id'=>'indexInvestigationReportUrl'])}}
            {{ Form::hidden('investigationReportLang', __('messages.delete.investigation_report'), ['id' => 'investigationReportLang']) }}
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--let investigationReportUrl = "{{url('investigation-reports')}}"--}}
{{--let patientUrl = "{{ url('patients') }}";--}}
{{--let doctorUrl = "{{ url('doctors') }}";--}}
{{--let downloadDocumentUrl = "{{ url('investigation-download') }}";--}}
{{--    <script src="{{ mix('assets/js/investigation_reports/investigation_reports.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
