@extends('layouts.app')
@section('title')
    {{ __('messages.birth_report.birth_reports') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('birthReportUrl',url('birth-reports'),['class'=>'birthReportUrl'])}}
            {{ Form::hidden('birthReportLang', __('messages.delete.birth_report'), ['id' => 'birthReportLang']) }}
            <livewire:birth-report-table/>
            @include('birth_reports.templates.templates')
            @include('birth_reports.create_modal')
            @include('birth_reports.edit_modal')
        </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let birthReportUrl = "{{ url('birth-reports') }}"--}}
{{--let birthReportCreateUrl = "{{ route('birth-reports.store') }}"--}}
{{--let patientUrl = "{{ url('patients') }}"--}}
{{--let doctorUrl = "{{ url('doctors') }}";--}}
{{--let caseUrl = "{{ url('patient-cases') }}";--}}
{{--    <script src="{{mix('assets/js/birth_reports/birth_reports.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/birth_reports/create-edit.js') }}"></script>--}}

