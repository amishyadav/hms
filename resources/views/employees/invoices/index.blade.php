@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.invoices') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:invoice-table/>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let invoiceUrl = "{{url('employee/invoices')}}"--}}
{{--        let patientUrl = "{{ url('patients') }}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/employee/invoice.js')}}"></script>--}}
