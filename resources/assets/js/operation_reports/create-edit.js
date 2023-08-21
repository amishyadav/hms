'use strict';

document.addEventListener('turbo:load', loadOperationCreateEditData)

function loadOperationCreateEditData() {
    $('#operationDoctorId, #operationCaseId').select2({
        width: '100%',
        dropdownParent: $('#addOperationsReportsModal'),
    });
    
    $('#editOperationDoctorId, #editOperationCaseId').select2({
        width: '100%',
        dropdownParent: $('#editOperationsReportsModal'),
    });
    
    $('#operationDate, #editOperationDate').flatpickr({
        dateFormat: 'Y-m-d h:i K',
        useCurrent: true,
        sideBySide: true,
        enableTime: true,
        locale: $('.userCurrentLanguage').val(),
    });
    
    listenHiddenBsModal('#addOperationsReportsModal, #editOperationsReportsModal',function () {
        $('#operationCaseId, #editOperationCaseId:first').focus();
    });
}

listenSubmit('#addOperationReportForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#operationReportSave');
    loadingButton.button('loading');
    $('#operationReportSave').attr('disabled', true);
    $.ajax({
        url: $('#operationReportCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addOperationsReportsModal').modal('hide');
                window.livewire.emit('refresh')
                // $('#operationReportsTable').
                //     DataTable().
                //     ajax.
                //     reload(null, false);
                $('#operationReportSave').attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#orValidationErrorsBox', result);
            $('#operationReportSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenClick('.edit-operation-reports-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let operationReportId = $(event.currentTarget).attr('data-id');
    renderOperationReportData(operationReportId)
});

window.renderOperationReportData = function (id) {
    $.ajax({
        url: $('#operationReportUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#operationReportId').val(result.data.id)
                $('#editOperationCaseId').
                    val(result.data.case_id).
                    trigger('change.select2')
                $('#editOperationDoctorId').
                    val(result.data.doctor_id).
                    trigger('change.select2');
                $('#editOperationDescription').val(result.data.description);
                document.querySelector('#editOperationDate').
                    _flatpickr.
                    setDate(moment(result.data.date).format());
                $('#editOperationsReportsModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenSubmit('#editOperationReportsForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#editOperationSave');
    loadingButton.button('loading');
    $('#editOperationSave').attr('disabled', true);
    let id = $('#operationReportId').val();
    $.ajax({
        url: $('#operationReportUrl').val() + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editOperationsReportsModal').modal('hide');
                window.livewire.emit('refresh');
                // $('#operationReportsTable').
                //     DataTable().
                //     ajax.
                //     reload(null, false);
                $('#editOperationSave').attr('disabled', false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
            $('#editOperationSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenHiddenBsModal('#addOperationsReportsModal', function () {
    resetModalForm('#addOperationReportForm', '#orValidationErrorsBox');
    $('#operationReportSave').attr('disabled', false);
    $('#operationCaseId, #operationDoctorId').val('').trigger('change.select2');
});

listenHiddenBsModal('#editOperationsReportsModal', function () {
    resetModalForm('#editOperationReportsForm', '#editOperationErrorsBox');
    $('#editOperationSave').attr('disabled', false);
});
