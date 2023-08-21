@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patient.edit_opd_patient') }}
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
                    {{ Form::model($opdPatientDepartment, ['route' => ['opd.patient.update', $opdPatientDepartment->id], 'method' => 'patch', 'id' => 'editOpdPatientDepartmentForm']) }}
                    {{Form::hidden('opdPatientCaseId',$opdPatientDepartment->case_id,['id'=>'editOPDPatientCaseId','class'=>'editOPDPatientCaseId'])}}
                    {{Form::hidden('patientCasesUrl',route('patient.cases.list'),['id'=>'editOpdPatientCasesUrl','class'=>'opdPatientCasesUrl'])}}
                    {{Form::hidden('doctorOpdChargeUrl',route('getDoctor.OPDcharge'),['id'=>'editDoctorOpdChargeUrl','class'=>'doctorOpdChargeUrl'])}}
                    {{Form::hidden('isEdit',true,['class'=>'isEdit'])}}
                    {{Form::hidden('lastVisit',false,['id'=>'editOpdLastVisit','class'=>'lastVisit'])}}
                    @include('opd_patient_departments.edit_fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--let patientCasesUrl = "{{ route('patient.cases.list') }}";--}}
{{--let doctorOpdChargeUrl = "{{ route('getDoctor.OPDcharge') }}";--}}
{{--let isEdit = true;--}}
{{--let lastVisit = false;--}}
{{--    <script src="{{mix('assets/js/opd_patients/create.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
