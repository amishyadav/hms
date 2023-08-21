@extends('layouts.app')
@section('title')
    {{ __('messages.appointment.new_appointment') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('appointments.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                    <div class="alert alert-danger hide" id="createAppointmentErrorsBox"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::open(['id' => 'appointmentForm']) }}

                    @include('appointments.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @include('appointments.templates.appointment_slot')
        {{ Form::hidden('doctorDepartmentUrl', url('doctors-list'), ['class' => 'doctorDepartmentUrl']) }}
        {{ Form::hidden('doctorScheduleList', url('doctor-schedule-list'), ['class' => 'doctorScheduleList']) }}
        {{ Form::hidden('appointmentSaveUrl', route('appointments.store'), ['id' => 'saveAppointmentURLID']) }}
        {{ Form::hidden('appointmentIndexPage', route('appointments.index'), ['class' => 'appointmentIndexPage']) }}
        {{ Form::hidden('isEdit', false, ['class' => 'isEdit']) }}
        {{ Form::hidden('isCreate', true, ['class' => 'isCreate']) }}
        {{ Form::hidden('getBookingSlot', route('get.booking.slot'), ['class' => 'getBookingSlot']) }}
    </div>
@endsection
{{--let doctorDepartmentUrl = "{{ url('doctors-list') }}";--}}
{{--let doctorScheduleList = "{{ url('doctor-schedule-list') }}";--}}
{{--let appointmentSaveUrl = "{{ route('appointments.store') }}";--}}
{{--        let appointmentIndexPage = "{{ route('appointments.index') }}";--}}
{{--//         let isEdit = false;--}}
{{--//         let isCreate = true;--}}
{{--        let getBookingSlot = "{{ route('get.booking.slot') }}";--}}
{{--    <script src="{{ asset('backend/js/moment-round/moment-round.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/appointments/create-edit.js')}}"></script>--}}
