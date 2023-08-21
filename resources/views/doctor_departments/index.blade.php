@extends('layouts.app')
@section('title')
    {{ __('messages.doctor_department.doctor_departments') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:doctor-department-table/>
        </div>
        @include('doctor_departments.create_modal')
        {{Form::hidden('doctorDepartmentUrl',url('doctor-departments'),['id'=>'indexDoctorDepartmentUrl'])}}
        {{Form::hidden('doctorDepartmentCreateUrl',route('doctor-departments.store'),['id'=>'indexDoctorDepartmentCreateUrl'])}}
        {{ Form::hidden('doctorDepartmentLang', __('messages.delete.doctor_department'), ['id' => 'doctorDepartmentLang']) }}
        @include('doctor_departments.edit_modal')
    </div>
@endsection
{{--let doctorDepartmentUrl = "{{url('doctor-departments')}}"--}}
{{--let doctorDepartmentCreateUrl = "{{ route('doctor-departments.store') }}"--}}
{{--    <script src="{{ mix('assets/js/doctors_departments/doctors_departments.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
