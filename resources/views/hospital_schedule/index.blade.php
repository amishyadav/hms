@extends('layouts.app')
@section('title')
    {{ __('messages.hospital_schedule') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{ Form::hidden('checkRecords', route('checkRecord'), ['class' => 'checkRecords']) }}
                    {{ Form::hidden('hospitalScheduleRoute', route('hospital-schedules.store'), ['class' => 'hospitalScheduleRoute']) }}
                    {{ Form::open(['route' => 'hospital-schedules.store', 'id' => 'saveForm', 'method' => 'POST']) }}
                    @include('hospital_schedule.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/hospital_schedule/create-edit.js') }}"></script>--}}

