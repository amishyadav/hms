@extends('layouts.app')
@section('title')
    {{ __('messages.blood_donor.blood_donors') }}
@endsection
@section('css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{ Form::hidden('bloodDonorCreateUrl', route('blood-donors.store'), ['id' => 'bloodDonorCreateUrl']) }}
            {{ Form::hidden('bloodDonorUrl', url('blood-donors'), ['id' => 'bloodDonorUrl']) }}
            {{ Form::hidden('bloodDonorLang', __('messages.delete.blood_donor'), ['id' => 'bloodDonorLang']) }}
            <livewire:blood-donor-table/>
            @include('blood_donors.modal')
            @include('blood_donors.edit_modal')
        </div>
    </div>
@endsection
{{--        let bloodDonorCreateUrl = "{{ route('blood-donors.store') }}";--}}
{{--        let bloodDonorUrl = "{{url('blood-donors')}}";--}}
{{--    <script src="{{ mix('assets/js/blood_donors/blood_donors.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
