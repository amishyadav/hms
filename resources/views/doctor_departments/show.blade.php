@extends('layouts.app')
@section('title')
    {{ __('messages.doctor_department.doctor_department_details') }}
@endsection
@section('page_css')
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">{{__('messages.doctor_department.doctor_department_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                @if (!Auth::user()->hasRole('Doctor|Patient|Receptionist'))
                    <a class="btn btn-primary me-4 doctor-department-edit-btn"
                       data-id="{{ $doctorDepartment->id }}">{{ __('messages.common.edit') }}</a>
                @endif
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            @include('doctor_departments.show_fields')
            @include('doctor_departments.edit_modal')
        </div>
        {{Form::hidden('showDoctorDepartmentUrl',Request::fullUrl(),['id'=>'showDoctorDepartmentUrl'])}}
        {{Form::hidden('doctorDepartmentUrl',url('doctor-departments'),['id'=>'indexDoctorDepartmentUrl'])}}
    </div>

@endsection
{{--@if(count($doctors) > 0)--}}
{{--    @section('page_scripts')--}}
{{--        <script src="{{ mix('assets/js/doctors_departments/doctor_departments_list.js') }}"></script>--}}
{{--    @endsection--}}
{{--@endif--}}
{{--        let doctorDepartmentUrl = "{{url('doctor-departments')}}";--}}
{{--    <script src="{{ mix('assets/js/doctors_departments/doctors_departments-details-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
