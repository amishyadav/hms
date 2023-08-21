@extends('layouts.app')
@section('title')
    {{ __('messages.doctor.doctor_details') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">{{ __('messages.doctor.doctor_details') }}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('layouts.errors')
        @include('flash::message')
        @include('employees.doctors.show_fields')
    </div>
@endsection
