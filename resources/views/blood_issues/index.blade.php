@extends('layouts.app')
@section('title')
    {{ __('messages.blood_issues') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('bloodIssueCreateUrl', route('blood-issues.store'), ['id' => 'bloodIssueCreateUrl']) }}
            {{ Form::hidden('bloodIssueUrl', route('blood-issues.index'), ['id' => 'bloodIssueUrl']) }}
            {{ Form::hidden('bloodGroupUrl', route('blood-issues.list'), ['id' => 'bloodGroupUrl']) }}
            {{ Form::hidden('bloodIssueLang', __('messages.delete.blood_issue'), ['id' => 'bloodIssueLang']) }}
            <livewire:blood-issue-table/>
            @include('blood_issues.add_modal')
            @include('blood_issues.edit_modal')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
{{--        let bloodIssueCreateUrl = "{{ route('blood-issues.store') }}";--}}
{{--        let bloodIssueUrl = "{{ route('blood-issues.index') }}";--}}
{{--        let bloodGroupUrl = "{{ route('blood-issues.list') }}";--}}
{{--        let doctorUrl = "{{ Auth::user()->hasRole('Lab Technician') ?  url('employee/doctor') :  url('doctors') }}";--}}
{{--        let isAdmin = "{{ Auth::user()->hasRole('Admin') ?  true :  false }}";--}}
{{--        let patientUrl = "{{ url('patients') }}";--}}
{{--    <script src="{{ mix('assets/js/blood_issues/blood_issues.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}

