document.addEventListener('turbo:load', loadCreateAdvancedPaymentData)

function loadCreateAdvancedPaymentData() {
    $('#advancedPaymentDate').flatpickr({
        defaultDate: new Date(),
        dateFormat: 'Y-m-d',
        locale: $('.userCurrentLanguage').val(),
    });

    let editDate = $('#editAdvancedPaymentDate').flatpickr({
        dateFormat: 'Y-m-d',
        locale: $('.userCurrentLanguage').val(),
    })
    $('#advancedPaymentPatientId').select2({
        dropdownParent: $('#addNewAdvancedPaymentForm'),
    })
    $('#editAdvancedPaymentPatientId').select2({
        dropdownParent: $('#editAdvancedPaymentModal'),
    })

}

listenShownBsModal('#addAdvancedPaymentModal, #editAdvancedPaymentModal',
    function () {
        $('#advancedPaymentPatientId, #editAdvancedPaymentPatientId:first').
            focus()
        let receiptNo = Math.random().toString(36).substr(2, 8).toUpperCase()
        $('.advancedPaymentReceiptNo').val(receiptNo)
    })

listenSubmit('#addNewAdvancedPaymentForm', function (event) {
    event.preventDefault()
    var loadingButton = jQuery(this).find('#advancedPaymentBtnSave')
    loadingButton.button('loading')
    $(loadingButton).attr('disabled', true)
    $.ajax({
        url: $('.advancePaymentCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $(loadingButton).attr('disabled', false)
                $('#addAdvancedPaymentModal').modal('hide')
                livewire.emit('refresh')
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result)
            $(loadingButton).attr('disabled', false)
        },
        complete: function () {
            loadingButton.button('reset')
        },
    })
})

listenClick('.advanced-payment-edit-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress()
    let advancedPaymentId = $(event.currentTarget).attr('data-id')
    renderAdvancePaymentsData(advancedPaymentId)
})

window.renderAdvancePaymentsData = function (id) {
    $.ajax({
        url: $('.advancedPaymentURL').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#advancePaymentId').val(result.data.id)
                $('#editAdvancedPaymentPatientId').
                    val(result.data.patient_id).
                    trigger('change.select2')
                $('#editAdvancedPaymentReceiptNo').val(result.data.receipt_no)
                $('#editAdvancedPaymentAmount').val(result.data.amount)
                $('.price-input').trigger('input')
                $('#editAdvancedPaymentDate').
                    val(format(result.data.date, 'YYYY-MM-DD'))
                // editDate.setDate(result.data.date)
                $('#editAdvancedPaymentsModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
    })
}

listenSubmit('#editAdvancedPaymentsForm', function (event) {
    event.preventDefault()
    var loadingButton = jQuery(this).find('#btnAdvancedPaymentEditSave')
    loadingButton.button('loading')
    let id = $('#advancePaymentId').val()
    $(loadingButton).attr('disabled', true)
    $.ajax({
        url: $('.advancedPaymentURL').val() + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $(loadingButton).attr('disabled', false)
                $('#editAdvancedPaymentsModal').modal('hide')
                livewire.emit('refresh')
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
            $(loadingButton).attr('disabled', false)
        },
        complete: function () {
            loadingButton.button('reset')
        },
    })
})

listenHiddenBsModal('#addNewAdvancedPaymentForm', function () {
    resetModalForm('#addNewAdvancedPaymentForm',
        '#validationAdvancePaymentErrorsBox')
    $('#advancedPaymentPatientId').val('').trigger('change.select2')
    $('#date').val(moment(new Date()).format('YYYY-MM-DD'))
    $('#advancedPaymentBtnSave').attr('disabled', false)
})

listenHiddenBsModal('#editAdvancedPaymentsModal', function () {
    resetModalForm('#editAdvancedPaymentsForm',
        '#editPaymentValidationErrorsBox')
    $('#btnAdvancedPaymentEditSave').attr('disabled', false)
})

