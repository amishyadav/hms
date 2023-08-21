@extends('layouts.app')
@section('title')
    {{ __('messages.live_consultations') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        {{Form::hidden('liveConsultationUrl',route('live.consultation.index'),['id'=>'indexLiveConsultationUrl'])}}
        {{Form::hidden('liveConsultationTypeNumber',route('live.consultation.list'),['id'=>'indexLiveConsultationTypeNumber'])}}
        {{Form::hidden('liveConsultationCreateUrl',route('live.consultation.store'),['id'=>'indexLiveConsultationCreateUrl'])}}
        {{Form::hidden('zoomCredentialCreateUrl',route('zoom.credential.create'),['id'=>'indexZoomCredentialCreateUrl'])}}
        {{Form::hidden('doctorRole',getLoggedInUser()->hasRole('Doctor')?true:false,['id'=>'indexConsultationDoctorRole'])}}
        {{Form::hidden('adminRole',getLoggedInUser()->hasRole('Admin')?true:false,['id'=>'indexConsultationAdminRole'])}}
        {{Form::hidden('patientRole',getLoggedInUser()->hasRole('Patient')?true:false,['id'=>'indexConsultationPatientRole'])}}
        {{ Form::hidden('liveConsultationLang',__('messages.delete.live_consultation'), ['id' => 'liveConsultationLang']) }}
        <div class="d-flex flex-column">
            <livewire:live-consultation-table/>
            @include('live_consultations.templates.templates')
            @include('live_consultations.add_modal')
            @include('live_consultations.edit_modal')
            @include('live_consultations.start_modal')
            @include('live_consultations.show_consultation_modal')
            @include('live_consultations.add_credential_modal')
        </div>
    </div>
@endsection
{{--        let liveConsultationUrl = "{{ route('live.consultation.index') }}";--}}
{{--        let liveConsultationTypeNumber = "{{ route('live.consultation.list') }}";--}}
{{--        let liveConsultationCreateUrl = "{{ route('live.consultation.store') }}";--}}
{{--        let zoomCredentialCreateUrl = "{{ route('zoom.credential.create') }}";--}}
{{--        let doctorRole = "{{getLoggedInUser()->hasRole('Doctor')?true:false}}";--}}
{{--        let adminRole = "{{getLoggedInUser()->hasRole('Admin')?true:false}}";--}}
{{--        let patientRole = "{{getLoggedInUser()->hasRole('Patient')?true:false}}";--}}
{{--    <script src="{{mix('assets/js/live_consultations/live_consultations.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
