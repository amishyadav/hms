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
            <livewire:super-admin-enquiry-table/>
        </div>
        {{ Form::hidden('enquiryUrl', route('super.admin.enquiry.index'), ['id' => 'enquiryIndexUrl']) }}
        {{ Form::hidden('adminEnquiryLang',__('messages.delete.enquiry'), ['id' => 'adminEnquiryLang']) }}
    </div>
@endsection
{{--        let enquiryUrl = "{{ route('super.admin.enquiry.index') }}"--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/super_admin_enquiry/super_admin_enquiry.js') }}"></script>--}}
