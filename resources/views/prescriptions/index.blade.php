@extends('layouts.app')
@section('title')
    {{ __('messages.prescriptions') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')

    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:prescription-table/>
        </div>
        @include('prescriptions.templates.templates')
        @include('prescriptions.show_modal')
        {{Form::hidden('prescriptionUrl',url('prescriptions'),['id'=>'indexPrescriptionUrl'])}}
        {{Form::hidden('doctorUrl',url('doctors'),['id'=>'indexPrescriptionDoctorUrl'])}}
        {{Form::hidden('patientUrl',route('patients.index'),['id'=>'indexPrescriptionPatientUrl'])}}
        {{ Form::hidden('prescriptions.show.modal', url('prescriptions-show-modal'), ['id' => 'prescriptionShowModal']) }}
    </div>

@endsection
{{--let prescriptionUrl = "{{url('prescriptions')}}"--}}
{{--let patientUrl = "{{ route('patients.index') }}"--}}
{{--let doctorUrl = "{{ url('doctors') }}"--}}
{{--    <script src="{{ mix('assets/js/prescriptions/prescriptions.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/prescriptions/create-edit.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
