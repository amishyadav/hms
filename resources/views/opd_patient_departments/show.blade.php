@extends('layouts.app')
@section('title')
    {{ __('messages.opd_patient.opd_patient_details') }}
@endsection
@section('page_css')
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('css')
    <link href="{{ asset('assets/css/timeline.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="javascript:history.back(-1);"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{Form::hidden('visitedOPDPatients',route('opd.patient.index'),['id'=>'showVisitedOPDPatients'])}}
            {{Form::hidden('opdPatientUrl',url('opds'),['id'=>'showOpdPatientUrl'])}}
            {{Form::hidden('doctorUrl',url('doctors'),['id'=>'showOpdDoctorUrl'])}}
            {{Form::hidden('patient_id',$opdPatientDepartment->patient_id,['id'=>'showOpdPatientId'])}}
            {{Form::hidden('opdPatientDepartmentId',$opdPatientDepartment->id,['id'=>'showOpdPatientDepartmentId'])}}
            {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'showOpdDefaultDocumentImageUrl'])}}
            {{Form::hidden('opdDiagnosisCreateUrl',route('opd.diagnosis.store'),['id'=>'showOpdDiagnosisCreateUrl'])}}
            {{Form::hidden('opdDiagnosisUrl',route('opd.diagnosis.index'),['id'=>'showOpdDiagnosisUrl'])}}
            {{Form::hidden('downloadDiagnosisDocumentUrl',url('opd-diagnosis-download'),['id'=>'showOpdDownloadDiagnosisDocumentUrl'])}}
            {{Form::hidden('opdTimelineCreateUrl',route('opd.timelines.store'),['id'=>'showOpdTimelineCreateUrl'])}}
            {{Form::hidden('opdTimelinesUrl',route('opd.timelines.index'),['id'=>'showOpdTimelinesUrl'])}}
            {{Form::hidden('opdPatientCaseDate',$opdPatientDepartment->patientCase->date,['id'=>'showOpdPatientCaseDate'])}}
            {{Form::hidden('id',$opdPatientDepartment->id,['id'=>'showOpdId'])}}
            {{Form::hidden('appointmentDate',$opdPatientDepartment->appointment_date,['id'=>'showOpdAppointmentDate'])}}
            {{ Form::hidden('opdTimelineLang',__('messages.delete.opd_timelines'), ['id' => 'opdTimelineLang']) }}
            {{ Form::hidden('opdTimelineLangYes',__('messages.common.yes'), ['id' => 'opdTimelineLangYes']) }}
            {{ Form::hidden('opdTimelineLangNo',__('messages.common.no'), ['id' => 'opdTimelineLangNo']) }}
            {{ Form::hidden('opdPatientVisitLang',__('messages.delete.opd_patient_visit'), ['id' => 'opdPatientVisitLang']) }}
            {{ Form::hidden('opdDiagnosisLang',__('messages.delete.opd_diagnosis'), ['id' => 'opdDiagnosisLang']) }}
            @include('flash::message')
            @include('opd_patient_departments.show_fields')
            @include('opd_diagnoses.add_modal')
            @include('opd_diagnoses.edit_modal')
            @include('opd_diagnoses.templates.templates')
            @include('opd_patient_departments.templates.templates')
            @include('opd_timelines.add_modal')
            @include('opd_timelines.edit_modal')
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let visitedOPDPatients = "{{ route('opd.patient.index') }}"--}}
{{--let opdPatientUrl = "{{url('opds')}}"--}}
{{--let doctorUrl = "{{url('doctors')}}"--}}
{{--let patient_id = "{{ $opdPatientDepartment->patient_id }}";--}}
{{--let opdPatientDepartmentId = "{{ $opdPatientDepartment->id }}";--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--let opdDiagnosisCreateUrl = "{{route('opd.diagnosis.store')}}";--}}
{{--let opdDiagnosisUrl = "{{route('opd.diagnosis.index')}}";--}}
{{--let downloadDiagnosisDocumentUrl = "{{ url('opd-diagnosis-download')}}";--}}
{{--let opdTimelineCreateUrl = "{{route('opd.timelines.store')}}";--}}
{{--let opdTimelinesUrl = "{{route('opd.timelines.index')}}";--}}
{{--let opdPatientCaseDate = "{{ $opdPatientDepartment->patientCase->date }}";--}}
{{--let id = "{{ $opdPatientDepartment->id }}";--}}
{{--let appointmentDate = "{{ $opdPatientDepartment->appointment_date }}";--}}
{{--    <script src="{{ mix('assets/js/opd_tab_active/opd_tab_active.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/opd_patients/visits.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/opd_diagnosis/opd_diagnosis.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/opd_timelines/opd_timelines.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
