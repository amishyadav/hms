'use strict'
document.addEventListener('turbo:load', loadPatientListingData)

function loadPatientListingData() {

    if (!$('#showPatientUrl').length) {
        return
    }

    $('#editPatientPaymentDate').flatpickr({
        dateFormat: 'Y-m-d',
        locale: $('.userCurrentLanguage').val(),
    })

    $('#editAdvancedPaymentModal').on('shown.bs.modal', function () {
        $('#editPatientPaymentId:first').focus()
    })

    $('#editVaccinationDoesGivenDate').flatpickr({
        enableTime: true,
        defaultDate: new Date(),
        dateFormat: 'Y-m-d H:i',
        locale: $('.userCurrentLanguage').val(),
    })

    listenShownBsModal('#editPatientVaccinationModal', function () {
        $('#editPatientVaccinationName, #editVaccinationPatientName').select2({
            width: '100%',
            dropdownParent: $('#editPatientVaccinationModal'),
        })
    })

    loadDeleteFunction()

}

listenClick('.edit-advancedPayment-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress()
    let advancedPaymentId = $(event.currentTarget).attr('data-id')
    renderPatientListingData(advancedPaymentId)
})

window.renderPatientListingData = function (id) {
    $.ajax({
        url: $('#showPatientAdvancedPaymentUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#patientAdvancePaymentId').val(result.data.id)
                $('#editPatientPaymentId').
                    val(result.data.patient_id).
                    trigger('change.select2')
                $('#editPatientPaymentReceiptNo').val(result.data.receipt_no)
                $('#editPatientPaymentAmount').val(result.data.amount)
                $('.price-input').trigger('input')
                document.querySelector('#editPatientPaymentDate').
                    _flatpickr.
                    setDate(moment(result.data.date).format())
                $('#editAdvancedPaymentModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
    })
}

listenSubmit('#editAdvancedPaymentForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#btnEditSave')
    loadingButton.button('loading')
    let id = $('#patientAdvancePaymentId').val()
    $.ajax({
        url: $('#showPatientAdvancedPaymentUrl').val() + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editAdvancedPaymentModal').modal('hide')
                location.reload()
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
        complete: function () {
            loadingButton.button('reset')
        },
    })
})

listenHiddenBsModal('#editAdvancedPaymentModal', function () {
    resetModalForm('#editAdvancedPaymentForm', '#editPatientPaymentErrorsBox')
})

listenClick('.edit-vaccination-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress()
    let vaccinatedPatientId = $(event.currentTarget).attr('data-id')
    renderVaccinationedData(vaccinatedPatientId)
})

window.renderVaccinationedData = function (id) {
    $.ajax({
        url: $('#showVaccinatedPatientUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let vaccinatedPatient = result.data
                $('#vaccinatedPatientId').val(vaccinatedPatient.id)
                $('#editVaccinationPatientName').
                    val(vaccinatedPatient.patient_id).
                    trigger('change.select2')
                $('#editPatientVaccinationName').
                    val(vaccinatedPatient.vaccination_id).
                    trigger('change.select2')
                $('#editVaccinationSerialNo').
                    val(vaccinatedPatient.vaccination_serial_number)
                $('#editVaccinationDoseNumber').
                    val(vaccinatedPatient.dose_number)
                document.querySelector('#editVaccinationDoesGivenDate').
                    _flatpickr.
                    setDate(moment(vaccinatedPatient.dose_given_date).format())
                $('#editVaccinationDescription').
                    val(vaccinatedPatient.description)
                $('#editPatientVaccinationModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
    })
}

listenSubmit('#editPatientVaccinationForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#editBtnSave')
    loadingButton.button('loading')
    let id = $('#vaccinatedPatientId').val()
    $.ajax({
        url: $('#showVaccinatedPatientUrl').val() + '/' + id + '/update',
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editPatientVaccinationModal').modal('hide')
                location.reload()
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
        complete: function () {
            loadingButton.button('reset')
        },
    })
})

listenHiddenBsModal('#editPatientVaccinationModal', function () {
    resetModalForm('#editPatientVaccinationForm',
        '#editPatientVaccinationErrorsBox1')
})

function loadDeleteFunction () {
    if (!$('#showPatientUrl').length) {
        return
    }

    listenClick('.delete-btn', function (event) {
        let Ele = $(this)
        let id = $(event.currentTarget).attr('data-id')
        let url = $(this).data('url')
        let message = $(this).data('message')
        deleteItem(url + '/' + id, '', message)
    })
}
    


    
    
