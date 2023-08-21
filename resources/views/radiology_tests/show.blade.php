@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_test.radiology_test_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{route('radiology.test.edit',['radiologyTest' => $radiologyTest->id])}}"
                   class="btn btn-primary me-2 me-2 me-2 edit-btn">{{ __('messages.common.edit') }}</a>
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary ms-2btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
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
                    @include('radiology_tests.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
