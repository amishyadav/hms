@extends('layouts.app')
@section('title')
    {{ __('messages.ambulance_call.ambulance_calls') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
{{--            <div class="d-sm-flex justify-content-between mb-5">--}}
{{--                @include('layouts.search-component')--}}
{{--                <div class="d-flex justify-content-end">--}}
{{--                    @if(Auth::user()->hasRole('Case Manager'))--}}
{{--                            <div class="dropdown">--}}
{{--                                <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"--}}
{{--                                   data-bs-toggle="dropdown"--}}
{{--                                   aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ route('ambulance-calls.create') }}" class="dropdown-item  px-5">--}}
{{--                                            {{ __('messages.insurance.new_insurance') }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ route('ambulance.calls.excel') }}" class="dropdown-item  px-5">--}}
{{--                                            {{ __('messages.common.export_to_excel') }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <a href="{{ route('ambulance-calls.create') }}"  class="btn btn-primary"> --}}
{{--                                {{ __('messages.ambulance_call.new_ambulance_call') }}--}}
{{--                            </a>--}}
{{--                        @endif--}}
            {{--                    </div>--}}
            {{--            </div>--}}
            <livewire:ambulance-call-table/>
            {{Form::hidden('ambulanceCallUrl',url('ambulance-calls'),['id'=>'showAmbulanceCallUrl'])}}
            {{Form::hidden('patientUrl',url('patients'),['id'=>'showCallPatientUrl'])}}
            {{ Form::hidden('ambulanceCallLang', __('messages.delete.ambulance_call'), ['id' => 'ambulanceCallLang']) }}
            {{--            @include('ambulance_calls.table')--}}
            @include('ambulance_calls.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let ambulanceCallUrl = "{{ url('ambulance-calls') }}";--}}
{{--let patientUrl = "{{url('patients')}}";--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/ambulance_call/ambulance_calls.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}

