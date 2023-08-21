@extends('layouts.app')
@section('title')
    {{ __('messages.hospital_blood_bank.blood_bank') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('bloodBankCreateUrl', route('blood-banks.store'), ['id' => 'bloodBankCreateUrl']) }}
            {{ Form::hidden('bloodBankUrl', url('blood-banks'), ['id' => 'bloodBankUrl']) }}
            {{ Form::hidden('bloodBankLang', __('messages.hospital_blood_bank.blood_bank'), ['id' => 'bloodBankLang']) }}
            <livewire:blood-bank-table/>
            @include('blood_banks.modal')
            @include('blood_banks.edit_modal')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
{{--        let bloodBankCreateUrl = "{{ route('blood-banks.store') }}";--}}
{{--        let bloodBankUrl = "{{ url('blood-banks') }}";--}}
{{--    <script src="{{ mix('assets/js/blood_banks/blood_banks.js') }}"></script>--}}
