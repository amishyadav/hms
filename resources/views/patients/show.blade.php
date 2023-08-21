@extends('layouts.app')
@section('title')
    {{ __('messages.patient.patient_details') }}
@endsection
@section('page_css')
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                @if (!Auth::user()->hasRole('Doctor|Accountant|Case Manager|Nurse|Patient'))
                    <a href="{{ route('patients.edit',['patient' => $data->id]) }}"
                       class="btn btn-primary me-4">{{ __('messages.common.edit') }}</a>
                @endif
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            @include('patients.show_fields')
            @include('patients.advanced_payments.edit_modal')
            @include('patients.vaccinations.edit_modal')
            {{Form::hidden('advancedPaymentUrl',url('advanced-payments'),['id'=>'showPatientAdvancedPaymentUrl'])}}
            {{Form::hidden('advancePaymentCreateUrl',route('advanced-payments.store'),['id'=>'showPatientAdvancePaymentCreateUrl'])}}
            {{Form::hidden('patientUrl',url('patients'),['id'=>'showPatientUrl'])}}
            {{Form::hidden('vaccinatedPatientUrl',route('vaccinated-patients.index'),['id'=>'showVaccinatedPatientUrl'])}}
        </div>
    </div>
@endsection
{{--        let advancedPaymentUrl = "{{url('advanced-payments')}}"--}}
{{--        let advancePaymentCreateUrl = "{{ route('advanced-payments.store') }}"--}}
{{--        let patientUrl = "{{ url('patients') }}"--}}
{{--        let vaccinatedPatientUrl = "{{ route('vaccinated-patients.index') }}";--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/patients/patients_data_listing.js') }}"></script>--}}
