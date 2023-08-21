@extends('layouts.app')
@section('title')
    {{ __('messages.death_report.death_reports') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('deathReportUrl',url('death-reports'),['class'=>'deathReportUrl'])}}
            {{ Form::hidden('deathReportLang', __('messages.death_reports'), ['id' => 'deathReportLang']) }}
            <livewire:death-report-table/>
            @include('death_reports.templates.templates')
            @include('death_reports.create_modal')
            @include('death_reports.edit_modal')
        </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let deathReportUrl = "{{ url('death-reports') }}"--}}
{{--let deathReportCreateUrl = "{{ route('death-reports.store') }}"--}}
{{--let patientUrl = "{{ url('patients') }}"--}}
{{--let doctorUrl = "{{ url('doctors') }}";--}}
{{--let caseUrl = "{{ url('patient-cases') }}";--}}
{{--    <script src="{{mix('assets/js/death_reports/death_reports.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/death_reports/create-edit.js') }}"></script>--}}
