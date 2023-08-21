'use strict';
document.addEventListener('turbo:load', loadBirthReportData)

function loadBirthReportData() {

    $('#caseBrId, #birthDoctorId').select2({
        width: '100%',
        dropdownParent: $('#addBirthReportModal'),
    })
    
    $('#editBRCaseId, #editBirthDoctorId').select2({
        width: '100%',
        dropdownParent: $('#editBirthReportModal'),
    });
    
    $('#birthReportDate, #editBirthReportDate').flatpickr({
        dateFormat: 'Y-m-d h:i K',
        useCurrent: true,
        sideBySide: true,
        enableTime: true,
        maxDate: new Date(),
        locale: $('.userCurrentLanguage').val(),
    });
    
    $('#addBirthReportModal, #editBirthReportModal').on('shown.bs.modal', function () {
        $('#caseBrId, #editCaseId:first').focus();
    });
}

listenSubmit('#addBirthReportNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnBRSave');
    loadingButton.button('loading');
    $('#btnBRSave').attr('disabled', true);
    $.ajax({
        url: $('.birthReportUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addBirthReportModal').modal('hide');
                window.livewire.emit('refresh')
                // $('#birthReportsTbl').DataTable().ajax.reload(null, false);
                $('#btnBRSave').attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#brValidationErrorsBox', result);
            $('#btnBRSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenClick('.edit-birth-report-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let birthReportId = $(event.currentTarget).attr('data-id');
    renderBirthReportData(birthReportId)
});

window.renderBirthReportData = function (id) {
    $.ajax({
        url: $('.birthReportUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#birthReportId').val(result.data.id)
                $('#editBRCaseId').
                    val(result.data.case_id).
                    trigger('change.select2')
                $('#editBirthDoctorId').
                    val(result.data.doctor_id).
                    trigger('change.select2');
                $('#editDescription').val(result.data.description);
                document.querySelector('#editBirthReportDate').
                    _flatpickr.
                    setDate(moment(result.data.date).format());
                $('#editBirthReportModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenSubmit('#editBirthReportForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditBRSave');
    loadingButton.button('loading');
    $('#btnEditBRSave').attr('disabled', true);
    let id = $('#birthReportId').val();
    $.ajax({
        url: $('.birthReportUrl').val() + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editBirthReportModal').modal('hide');
                window.livewire.emit('refresh')
                // $('#birthReportsTbl').DataTable().ajax.reload(null, false);
                $('#btnEditBRSave').attr('disabled', false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
            $('#btnEditBRSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenHiddenBsModal('#addBirthReportModal', function () {
    resetModalForm('#addBirthReportNewForm', '#brValidationErrorsBox');
    $('#caseBrId, #birthDoctorId').val('').trigger('change.select2');
    $('#btnBRSave').attr('disabled', false);
});

listenHiddenBsModal('#editBirthReportModal', function () {
    resetModalForm('#editBirthReportForm', '#editBRValidationErrorsBox');
    $('#btnEditBRSave').attr('disabled', false);
});
