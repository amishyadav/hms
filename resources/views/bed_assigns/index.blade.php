@extends('layouts.app')
@section('title')
    {{ __('messages.bed_assign.bed_assigns') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
        <div class="container-fluid">
            <div class="d-flex flex-column">
                @include('flash::message')
                <livewire:bed-assign-table/>
                @include('bed_assigns.templates.templates')
                {{ Form::hidden('bedAssignUrl', url('bed-assigns'), ['id' => 'bedAssignUrl']) }}
                {{ Form::hidden('bedUrl', url('beds'), ['id' => 'bedUrl']) }}
                {{ Form::hidden('patientUrl', url('patients'), ['id' => 'patientUrl']) }}
                {{ Form::hidden('caseUrl', url('patient-cases'), ['id' => 'caseUrl']) }}
                {{ Form::hidden('bedAssignLang', __('messages.delete.bed_assign'), ['id' => 'bedAssignLang']) }}
            </div>
        </div>
@endsection
{{--let bedAssignUrl = "{{ url('bed-assigns') }}";--}}
{{--let bedUrl = "{{url('beds')}}";--}}
{{--let patientUrl = "{{url('patients')}}";--}}
{{--let caseUrl = "{{ url('patient-cases') }}";--}}
{{--    <script src="{{ mix('assets/js/bed_assign/bed_assign.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
