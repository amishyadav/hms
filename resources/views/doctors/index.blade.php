@extends('layouts.app')
@section('title')
    {{ __('messages.doctors') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:doctor-table/>
            {{Form::hidden('doctorUrl',url('doctors'),['id'=>'indexDoctorUrl'])}}
            {{ Form::hidden('doctorLang', __('messages.doctor_opd_charge.doctor'), ['id' => 'doctorLang']) }}
        </div>
    </div>
@endsection
{{--let doctorUrl = "{{url('doctors')}}"--}}
{{--let userUrl = "{{route('users.index')}}"--}}
{{--    <script src="{{ mix('assets/js/doctors/doctors.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
