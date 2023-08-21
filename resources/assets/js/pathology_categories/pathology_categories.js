'use strict';
listenSubmit('#addPathologyCategoryForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#pathologyCategorySave');
    loadingButton.button('loading');
    $('#pathologyCategorySave').attr('disabled', true);
    $.ajax({
        url: $('#createPathologyCategoryURL').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addPathologyCategoriesModal').modal('hide');
                window.livewire.emit('refresh')
                $('#pathologyCategorySave').attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#pCatValidationErrorsBox', result);
            $('#pathologyCategorySave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenSubmit('#editPathologyCategoriesForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#editPathologyCategorySaveBtn');
    loadingButton.button('loading');
    var id = $('#pathologyCategoryId').val();
    $('#editPathologyCategorySaveBtn').attr('disabled', true);
    $.ajax({
        url: $('#pathologyCategoryURL').val() + '/' + id,
        type: 'patch',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editPathologyCategoriesModal').modal('hide');
                window.livewire.emit('refresh')
                $('#editPathologyCategorySaveBtn').attr('disabled', false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
            $('#editPathologyCategorySaveBtn').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenHiddenBsModal('#addPathologyCategoriesModal', function () {
    resetModalForm('#addPathologyCategoryForm', '#pCatValidationErrorsBox');
    $('#pathologyCategorySave').attr('disabled', false);
});

listenHiddenBsModal('#editPathologyCategoriesModal', function () {
    resetModalForm('#editPathologyCategoriesForm', '#editPCatValidationErrorsBox');
    $('#editPathologyCategorySaveBtn').attr('disabled', false);
});

window.renderPathologyData = function (id) {
    $.ajax({
        url: $('#pathologyCategoryURL').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let pathologyCategory = result.data
                $('#pathologyCategoryId').val(pathologyCategory.id)
                $('#editPathologyCategoryName').val(pathologyCategory.name)
                $('#editPathologyCategoriesModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenClick('.edit-pathology-category-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let pathologyCategoryId = $(event.currentTarget).attr('data-id');
    renderPathologyData(pathologyCategoryId)
});

listenClick('.delete-pathology-category-btn', function (event) {
    let pathologyCategoryId = $(event.currentTarget).attr('data-id');
    deleteItem($('#pathologyCategoryURL').val() + '/' + pathologyCategoryId,
        '#pathologyCategoryTable', $('#pathologyCategoryLang').val());
});
