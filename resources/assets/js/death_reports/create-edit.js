'use strict';

document.addEventListener('turbo:load', loadDeathReportData)

function loadDeathReportData() {

    $('#deathCaseId, #deathDoctorId').select2({
        width: '100%',
        dropdownParent: $('#addDeathReportModal'),
    }); 
    
    $('#editDeathCaseId, #editDeathDoctorId').select2({
        width: '100%',
        dropdownParent: $('#editDeathReportModal'),
    });
    
    $('#deathDate, #editDeathDate').flatpickr({
        dateFormat: 'Y-m-d h:i K',
        useCurrent: true,
        enableTime: true,
        sideBySide: true,
        maxDate: new Date(),
        locale: $('.userCurrentLanguage').val(),
    });
}

listenSubmit('#addDeathReportNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnDRSave');
    loadingButton.button('loading');
    $('#btnDRSave').attr('disabled', true);
    $.ajax({
        url: route('death-reports.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addDeathReportModal').modal('hide');
                window.livewire.emit('refresh');
                // $('#deathReportsTbl').DataTable().ajax.reload(null, false);
                $('#btnDRSave').attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result);
            $('#btnDRSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenClick('.edit-death-report-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let deathReportId = $(event.currentTarget).attr('data-id');
    renderDeathReportData(deathReportId)
});

window.renderDeathReportData = function (id) {
    $.ajax({
        url: $('.deathReportUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#deathReportId').val(result.data.id)
                $('#editDeathCaseId').
                    val(result.data.case_id).
                    trigger('change.select2')
                $('#editDeathDoctorId').
                    val(result.data.doctor_id).
                    trigger('change.select2');
                $('#editDescription').val(result.data.description);
                document.querySelector('#editDeathDate').
                    _flatpickr.
                    setDate(moment(result.data.date).format());
                $('#editDeathReportModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenSubmit('#editDeathReportForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditDRSave');
    loadingButton.button('loading');
    $('#btnEditDRSave').attr('disabled', true);
    let id = $('#deathReportId').val();
    $.ajax({
        url: $('.deathReportUrl').val() + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editDeathReportModal').modal('hide');
                window.livewire.emit('refresh');
                // $('#deathReportsTbl').DataTable().ajax.reload(null, false);
                $('#btnEditDRSave').attr('disabled', false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
            $('#btnEditDRSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenHiddenBsModal('#addDeathReportModal', function () {
    resetModalForm('#addDeathReportNewForm', '#drValidationErrorsBox');
    $('#btnDRSave').attr('disabled', false);
    $('#deathCaseId, #deathDoctorId').val('').trigger('change.select2');
});

listenHiddenBsModal('#editDeathReportModal', function () {
    $('#btnEditDRSave').attr('disabled', false);
    resetModalForm('#editDeathReportForm', '#editDRValidationErrorsBox');
});
