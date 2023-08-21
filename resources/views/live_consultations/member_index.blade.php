@extends('layouts.app')
@section('title')
    {{ __('messages.live_meetings') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        {{Form::hidden('liveMeetingUrl',route('live.meeting.index'),['id'=>'indexLiveMeetingUrl'])}}
        {{Form::hidden('liveMeetingCreateUrl',route('live.meeting.store'),['id'=>'indexLiveMeetingCreateUrl'])}}
        {{Form::hidden('doctorRole',getLoggedInUser()->hasRole('Doctor')?true:false,['id'=>'indexMeetingDoctorRole'])}}
        {{Form::hidden('adminRole',getLoggedInUser()->hasRole('Admin')?true:false,['id'=>'indexMeetingAdminRole'])}}
        {{ Form::hidden('liveMeetingLang',__('messages.delete.live_meeting'), ['id' => 'liveMeetingLang']) }}
        <div class="d-flex flex-column">
            <livewire:live-meeting-table/>
            {{--            @include('live_consultations.member_table')--}}
            @include('live_consultations.templates.templates')
            @include('live_consultations.add_meeting_modal')
            @include('live_consultations.edit_meeting_modal')
            @include('live_consultations.start_meeting_modal')
            @include('live_consultations.show_meeting_modal')
        </div>
    </div>
@endsection
{{--        let liveMeetingUrl = "{{ route('live.meeting.index') }}";--}}
{{--        let liveMeetingCreateUrl = "{{ route('live.meeting.store') }}";--}}
{{--        let doctorRole = "{{getLoggedInUser()->hasRole('Doctor')?true:false}}";--}}
{{--        let adminRole = "{{getLoggedInUser()->hasRole('Admin')?true:false}}";--}}
{{--    <script src="{{mix('assets/js/live_consultations/live_meetings.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
