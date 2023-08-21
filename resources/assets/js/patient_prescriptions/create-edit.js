'use strict';

document.addEventListener('turbo:load', loadPatientPrescriptionDate)

function loadPatientPrescriptionDate() {
    $('#patient_id,#filter_status').select2({
        width: '100%',
    });
}
