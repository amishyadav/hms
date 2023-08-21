@extends('layouts.app')
@section('title')
    {{ __('messages.enquiries') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:enquiry-table/>
            {{Form::hidden('enquiryUrl',url('enquiries'),['id'=>'indexEnquiryUrl'])}}
            {{Form::hidden('enquiryShowUrl',url('enquiry'),['id'=>'indexEnquiryShowUrl'])}}
        </div>
    </div>
@endsection
{{--let enquiryUrl = "{{url('enquiries')}}";--}}
{{--let enquiryShowUrl = "{{url('enquiry')}}";--}}
{{--    <script src="{{ mix('assets/js/enquiry/enquiry.js') }}"></script>--}}
