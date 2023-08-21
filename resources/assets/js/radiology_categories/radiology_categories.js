'use strict';

listenSubmit('#addRadiologyCatNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnRdSave');
    loadingButton.button('loading');
    $('#btnRdSave').attr('disabled', true);
    $.ajax({
        url: $('#createRadiologyCategoryURL').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addRadiologyCatModal').modal('hide');
                window.livewire.emit('refresh')
                $('#btnRdSave').attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#rdValidationErrorsBox', result);
            $('#btnRdSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenSubmit('#editRadiologyCatForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditRdSave');
    loadingButton.button('loading');
    $('#btnEditRdSave').attr('disabled', true);
    var id = $('#radiologyCategoryId').val();
    $.ajax({
        url: $('#radiologyCategoryURL').val() + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editRadiologyCatModal').modal('hide');
                window.livewire.emit('refresh')
                $('#btnEditRdSave').attr('disabled', false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
            $('#btnEditRdSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenHiddenBsModal('#addRadiologyCatModal', function () {
    resetModalForm('#addRadiologyCatNewForm', '#rdValidationErrorsBox');
    $('#btnRdSave').attr('disabled', false);
});

listenHiddenBsModal('#editRadiologyCatModal', function () {
    resetModalForm('#editRadiologyCatForm', '#editRdValidationErrorsBox');
    $('#btnEditRdSave').attr('disabled', false);
});

window.renderRadiologyCatData = function (id) {
    $.ajax({
        url: $('#radiologyCategoryURL').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let radiologyCategory = result.data;
                $('#radiologyCategoryId').val(radiologyCategory.id);
                $('#editRadiologyCatName').val(radiologyCategory.name);
                $('#editRadiologyCatModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};
listenClick('.edit-radiology-cat-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let radiologyCategoryId = $(event.currentTarget).attr('data-id');
    renderRadiologyCatData(radiologyCategoryId);
});

listenClick('.delete-radiology-cat-btn', function (event) {
    let radiologyCategoryId = $(event.currentTarget).attr('data-id');
    deleteItem($('#radiologyCategoryURL').val() + '/' + radiologyCategoryId,
        '#radiologyCategoryTable', $('#radiologyCategoryLang').val());
});
