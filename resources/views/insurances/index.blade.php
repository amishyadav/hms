@extends('layouts.app')
@section('title')
    {{ __('messages.insurance.insurances') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:insurance-table/>
            {{Form::hidden('insuranceUrl',url('insurances'),['id'=>'indexInsuranceUrl'])}}
            {{ Form::hidden('insuranceLang', __('messages.delete.insurance'), ['id' => 'insuranceLang']) }}
            @include('insurances.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--let insuranceUrl = "{{ url('insurances') }}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/insurances/insurances.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
