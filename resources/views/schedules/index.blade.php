@extends('layouts.app')
@section('title')
    {{ __('messages.schedules') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:schedule-table/>
            {{Form::hidden('scheduleUrl',url('schedules'),['id'=>'indexScheduleUrl'])}}
            {{Form::hidden('doctorUrl',url('doctors'),['id'=>'indexScheduleDoctorUrl'])}}
            {{ Form::hidden('scheduleLang',__('messages.delete.schedule'), ['id' => 'scheduleLang']) }}
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let scheduleUrl = "{{ url('schedules') }}"--}}
{{--let doctorUrl = "{{ url('doctors') }}"--}}
{{--    <script src="{{mix('assets/js/schedules/schedules.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
