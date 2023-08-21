@extends('layouts.app')
@section('title')
    {{ __('messages.appointment.appointment_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                @if (!Auth::user()->hasRole('Doctor'))
                    <a href="{{ route('appointments.edit',['appointment' => $appointment->id])}}"
                       class="btn btn-primary me-4">{{ __('messages.common.edit') }}</a>
                @endif
                <a href="{{route('appointments.index')}}"
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
                <div class="card-body">
                    @include('appointments.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
