@extends('layouts.app')
@section('title')
    {{ __('messages.death_report.death_report_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{ __('messages.death_report.death_report_details') }}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a data-id="{{ $deathReport->id }}"
                   class="btn btn-primary me-2 me-2 edit-btn">{{ __('messages.common.edit') }}</a>
                <a href="{{route('death-reports.index')}}"
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
                {{Form::hidden('deathReportUrl',url('death-reports'),['class'=>'deathReportUrl'])}}
                <div class="card-body">
                    @include('death_reports.show_fields')
                    @include('death_reports.edit_modal')
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let deathReportUrl = "{{ url('death-reports') }}"--}}
{{--    <script src="{{ mix('assets/js/death_reports/death_reports-details-edit.js') }}"></script>--}}
