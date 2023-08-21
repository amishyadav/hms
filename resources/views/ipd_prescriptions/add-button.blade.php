@if(Auth::user()->hasRole('Admin|Doctor'))
    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
       data-bs-target="#addIpdPrescriptionModal">
        {{ __('messages.ipd_patient_prescription.new_prescription') }}
    </a>
@endif
