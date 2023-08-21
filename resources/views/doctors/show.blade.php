@extends('layouts.app')
@section('title')
    {{ __('messages.doctor.doctor_details') }}
@endsection
@section('page_css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                @if (Auth::user()->hasRole('Admin|Receptionist'))
                    <a href="{{route('doctors.edit',['doctor' => $doctorData->id]) }}"
                       class="btn btn-primary me-4">{{ __('messages.common.edit') }}</a>
                @endif
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            @include('doctors.show_fields')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/doctors/doctors_data_listing.js') }}"></script>--}}
