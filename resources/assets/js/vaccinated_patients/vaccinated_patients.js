'use strict';

document.addEventListener('turbo:load', loadVaccinatedPatientData)

function loadVaccinatedPatientData() {
    $('#vaccinatedPatientName,#vPatientVaccinationName').select2({
        width: '100%',
        dropdownParent: $('#addVaccinatedPatientModal'),
    })

    $('#editVaccinatedPatientName,#editVaccinationPatientName').select2({
        width: '100%',
        dropdownParent: $('#editVaccinatedPatientModal'),
    })

    let doesDatePicker = $('#doesVPGivenDate,#editVPDoesGivenDate').flatpickr({
        enableTime: true,
        defaultDate: new Date(),
        dateFormat: 'Y-m-d H:i',
        locale: $('.userCurrentLanguage').val(),
    })
}

// let editDoesDatePicker = $('#editVPDoesGivenDate').flatpickr({
//     enableTime: true,
//     dateFormat: 'Y-m-d H:i',
// });

listenShownBsModal('#addVaccinatedPatientModal', function () {
    // doesDatePicker.set('minDate', new Date());
    $('#doesVPGivenDate').val(moment().format('YYYY-MM-DD HH:mm'))
})

listenSubmit('#addVaccinatedPatientNewForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#btnVPSave')
    loadingButton.button('loading')
    $('#btnVPSave').attr('disabled', true)
    $.ajax({
        url: $('#vaccinatedPatientsStore').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addVaccinatedPatientModal').modal('hide');
                Livewire.emit('refresh')
                setTimeout(function () {
                    loadingButton.button('reset');
                }, 2500);
                $('#btnVPSave').attr('disabled', false); 
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result);
            setTimeout(function () {
                loadingButton.button('reset');
            }, 2000);
            $('#btnVPSave').attr('disabled', false);
        },
    });
});

listenHiddenBsModal('#addVaccinatedPatientModal', function () {
    // doesDatePicker.close()
    $('#vaccinatedPatientName').val('').trigger('change')
    $('#vPatientVaccinationName').val('').trigger('change')
    resetModalForm('#addVaccinatedPatientNewForm', '#validationErrorsBox')
    $('#btnVPSave').attr('disabled', false)
})

// $('#editVaccinatedPatientModal').on('hidden.bs.modal', function () {
//     editDoesDatePicker.close()
// })

// let editDoesGivenDate = $('#editVPDoesGivenDate').flatpickr();

listenClick('.edit-vaccinated-patient-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress()
    let vaccinatedPatientId = $(event.currentTarget).attr('data-id')
    renderVaccinatedPatientData(vaccinatedPatientId)
});

window.renderVaccinatedPatientData = function (id) {
    $.ajax({
        url: $('#vaccinatedPatientsIndex').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let vaccinatedPatient = result.data
                $('#vPatientId').val(vaccinatedPatient.id)
                $('#editVaccinatedPatientName').
                    val(vaccinatedPatient.patient_id).
                    trigger('change.select2')
                $('#editVaccinationPatientName').
                    val(vaccinatedPatient.vaccination_id).
                    trigger('change.select2')
                $('#editVPSerialNo').
                    val(vaccinatedPatient.vaccination_serial_number)
                $('#editVPDoseNumber').val(vaccinatedPatient.dose_number)
                $('#editVPDoesGivenDate').val(moment(vaccinatedPatient.
                    dose_given_date).utc().format('YYYY-MM-DD HH:mm:ss'))
                $('#editVPDescription').val(vaccinatedPatient.description)
                $('#editVaccinatedPatientModal').modal('show')
                ajaxCallCompleted()
                // editDoesDatePicker.set('minDate', $('#editVPDoesGivenDate').val());
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenSubmit('#editVaccinatedPatientForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#editVPBtnSave');
    loadingButton.button('loading');
    let id = $('#vPatientId').val();
    $('#editVPBtnSave').attr('disabled', true);
    $.ajax({
        url: $('#vaccinatedPatientsIndex').val() + '/' + id + '/update',
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editVaccinatedPatientModal').modal('hide');
                $('#editVPBtnSave').attr('disabled', false);
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
            $('#editVPBtnSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenClick('.delete-vaccinated-patient-btn', function (event) {
    let vaccinatedPatientId = $(event.currentTarget).attr('data-id');
    deleteItem($('#vaccinatedPatientsIndex').val() + '/' + vaccinatedPatientId,
        '#vaccinatedPatientTable', $('#vaccinationPatientLang').val());
});
