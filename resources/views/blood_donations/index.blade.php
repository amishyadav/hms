@extends('layouts.app')
@section('title')
    {{ __('messages.blood_donations') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('bloodDonationCreateUrl', route('blood-donations.store'), ['id' => 'bloodDonationCreateUrl']) }}
            {{ Form::hidden('bloodDonationUrl', route('blood-donations.index'), ['id' => 'bloodDonationUrl']) }}
            {{ Form::hidden('bloodDonationLang', __('messages.delete.blood_donation'), ['id' => 'bloodDonationLang']) }}
            <livewire:blood-donation-table/>
            @include('blood_donations.add_modal')
            @include('blood_donations.edit_modal')
            {{--            @include('partials.modal.templates.templates')--}}
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
{{--        let bloodDonationCreateUrl = "{{ route('blood-donations.store') }}";--}}
{{--        let bloodDonationUrl = "{{route('blood-donations.index')}}";--}}
{{--    <script src="{{ mix('assets/js/blood_donations/blood_donations.js') }}"></script>--}}
