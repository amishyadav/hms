@extends('layouts.app')
@section('title')
    {{ __('messages.schedule.details') }}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">{{__('messages.schedule.details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary me-4"
                   href="{{ route('schedules.edit',['schedule' => $schedule->id])}}">{{ __('messages.common.edit') }}</a>
                <a href="{{route('schedules.index') }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
        <div class="d-flex flex-column">
            @include('flash::message')
            @include('schedules.show_fields')
        </div>
    </div>
@endsection
