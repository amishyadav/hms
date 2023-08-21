@extends('layouts.app')
@section('title')
    {{ __('messages.ambulance_call.new_ambulance_call') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('ambulance-calls.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{Form::hidden('getDriverNameUrl',route('driver.name'),['class'=>'getDriverNameUrl'])}}
                    {{ Form::open(['route' => 'ambulance-calls.store', 'id' => 'createAmbulanceCall']) }}

                    @include('ambulance_calls.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let getDriverNameUrl = "{{ route('driver.name') }}";--}}
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/ambulance_call/create-edit.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
