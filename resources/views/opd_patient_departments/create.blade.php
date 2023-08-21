@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patient.new_opd_patient') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('opd.patient.index') }}"
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
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{Form::hidden('patientCasesUrl',route('patient.cases.list'),['id'=>'createOpdPatientCasesUrl','class'=>'opdPatientCasesUrl'])}}
                    {{Form::hidden('doctorOpdChargeUrl',route('getDoctor.OPDcharge'),['id'=>'createDoctorOpdChargeUrl','class'=>'doctorOpdChargeUrl'])}}
                    {{Form::hidden('isEdit',false,['class'=>'isEdit'])}}
                    {{Form::hidden('lastVisit',(isset($data['last_visit'])) ? $data['last_visit']->patient_id : false,['id'=>'createOpdLastVisit','class'=>'lastVisit'])}}
                    {{ Form::open(['route' => ['opd.patient.store'], 'method'=>'post', 'id' => 'createOpdPatientForm']) }}
                    @include('opd_patient_departments.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let patientCasesUrl = "{{ route('patient.cases.list') }}";--}}
{{--let doctorOpdChargeUrl = "{{ route('getDoctor.OPDcharge') }}";--}}
{{--let isEdit = false;--}}
{{--let lastVisit = "{{ (isset($data['last_visit'])) ? $data['last_visit']->patient_id : false }}";--}}
{{--    <script src="{{mix('assets/js/opd_patients/create.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
