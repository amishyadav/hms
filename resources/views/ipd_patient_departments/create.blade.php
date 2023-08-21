@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.new_ipd_patient') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('ipd.patient.index') }}"
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
                {{Form::hidden('patientCasesUrl',route('patient.cases.list'),['id'=>'createPatientCasesUrl','class'=>'patientCasesUrl'])}}
                {{Form::hidden('patientBedsUrl',route('patient.beds.list'),['id'=>'createPatientBedsUrl','class'=>'patientBedsUrl'])}}
                {{Form::hidden('isEdit',false,['class'=>'isEdit'])}}
                <div class="card-body p-12">
                    {{ Form::open(['route' => ['ipd.patient.store'], 'method'=>'post', 'files' => true, 'id' => 'createIpdPatientForm']) }}
                    @include('ipd_patient_departments.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let patientCasesUrl = "{{ route('patient.cases.list') }}";--}}
{{--        let patientBedsUrl = "{{ route('patient.beds.list') }}";--}}
{{--        let isEdit = false;--}}
{{--    <script src="{{mix('assets/js/ipd_patients/create.js')}}"></script>--}}
