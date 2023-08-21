@extends('layouts.app')
@section('title')
    {{ __('messages.doctor_opd_charges') }}
@endsection
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('doctorOPDChargeUrl', url('doctor-opd-charges'), ['id' => 'doctorOPDChargeURLID']) }}
            {{ Form::hidden('doctorOPDChargeCreateUrl', route('doctor-opd-charges.store'), ['id' => 'doctorOPDCreateChargeURLID']) }}
            {{ Form::hidden('doctorShowUrl', url('doctors'), ['id' => 'doctorShowURLID']) }}
            {{ Form::hidden('doctorOpdChargeLang', __('messages.delete.doctor_opd_charge'), ['id' => 'doctorOpdChargeLang']) }}
            <livewire:doctor-opd-charge-table/>
            @include('doctor_opd_charges.templates.templates')
            @include('doctor_opd_charges.create_modal')
            @include('doctor_opd_charges.edit_modal')
        </div>
    </div>
@endsection
{{--        let doctorOPDChargeUrl = "{{url('doctor-opd-charges')}}";--}}
{{--        let doctorOPDChargeCreateUrl = "{{route('doctor-opd-charges.store')}}";--}}
{{--        let doctorShowUrl = "{{url('doctors')}}";--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/doctor_opd_charges/doctor_opd_charges.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
