@php
    $ipdPatientDepartment = \App\Models\IpdPatientDepartment::findOrFail(2);
@endphp
@if(!$ipdPatientDepartment->bill_status)
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addIpdChargesModal">
        {{ __('messages.ipd_patient_charges.new_charge') }}
    </a>
@endif

