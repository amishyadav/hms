@extends('layouts.app')
@section('title')
    {{ __('messages.ipd_patient.ipd_patient_details') }}
@endsection

@section('page_css')
@endsection

@section('css')
    <link href="{{ asset('assets/css/timeline.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
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
            @include('ipd_patient_list.show_fields')
            @include('ipd_prescriptions.show_modal')
            {{Form::hidden('ipdPrescriptionUrl',route('ipd.prescription.index'),['id'=>'showListIpdPrescriptionUrl'])}}
            {{Form::hidden('bootStrapUrl',asset('assets/css/bootstrap.min.css'),['id'=>'showListBootstrapUrl'])}}
            {{Form::hidden('ipdPatientDepartmentId',$ipdPatientDepartment->id,['id'=>'showListIpdPatientDepartmentId'])}}
            {{Form::hidden('ipdTimelinesUrl',route('ipd.timelines.index'),['id'=>'showListIpdTimelinesUrl'])}}
            {{Form::hidden('ipdStripePaymentUrl',url('stripe-charge'),['id'=>'showListIpdStripePaymentUrl'])}}
            {{Form::hidden('ipdPrescriptionUrl',route('ipd.prescription.index'),['id'=>'showIpdPrescriptionUrl'])}}
            {{Form::hidden('stripeConfigKey',$stripeKey,['id' => 'stripeConfigKey'])}}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//js.stripe.com/v3/"></script>
    {{--let ipdDiagnosisUrl = "{{route('ipd.diagnosis.index')}}"--}}
    {{--let ipdConsultantRegisterUrl = "{{route('ipd.consultant.index')}}";--}}
    {{--let ipdChargesUrl = "{{route('ipd.charge.index')}}";--}}
    {{--let ipdPatientDepartmentId = "{{ $ipdPatientDepartment->id }}";--}}
    {{--let doctorUrl = "{{url('doctors')}}";--}}
    {{--let ipdPrescriptionUrl = "{{route('ipd.prescription.index')}}";--}}
    {{--let ipdTimelinesUrl = "{{route('ipd.timelines.index')}}";--}}
    {{--let ipdPaymentUrl = "{{route('ipd.payments.index')}}";--}}
    {{--let ipdPaymentModes = JSON.parse('@json($paymentModes)');--}}
    {{--let stripe = Stripe('{{ config('services.stripe.key') }}');--}}
    {{--let ipdStripePaymentUrl = '{{ url('stripe-charge') }}';--}}
    {{--let downloadDiagnosisDocumentUrl = "{{ url('ipd-diagnosis-download') }}";--}}
    {{--let downloadPaymetDocumentUrl = "{{ url('ipd-payment-download') }}";--}}
    {{--let downloadTimelineDocumentUrl = "{{ url('ipd-timeline-download') }}";--}}
    {{--let bootstarpUrl = "{{ asset('assets/css/bootstrap.min.css') }}";--}}
    {{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_diagnosis.js') }}"></script>--}}
    {{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_consultant_register.js') }}"></script>--}}
    {{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_charges.js') }}"></script>--}}
    {{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_prescriptions.js') }}"></script>--}}
    {{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_timelines.js') }}"></script>--}}
    {{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
    {{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_payments.js') }}"></script>--}}
    {{--    <script src="{{ mix('assets/js/ipd_patients_list/ipd_stripe_payment.js') }}"></script>--}}
@endsection
