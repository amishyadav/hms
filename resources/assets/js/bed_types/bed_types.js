document.addEventListener('turbo:load', loadAdminBedTypeData)

function loadAdminBedTypeData() {
    
}

listenClick('.bed-type-edit-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let bedTypeId = $(event.currentTarget).attr('data-id');
    renderBedTypeData(bedTypeId)
})

listenClick('.bed-type-delete-btn', function (event) {
    let bedTypeId = $(event.currentTarget).attr('data-id');
    deleteItem($('#bedTypeIndexUrl').val() + '/' + bedTypeId, '#bedTypesTbl',
        $('#bedTypeLang').val())
})

window.renderBedTypeData = function (id) {
    $.ajax({
        url: $('#bedTypeIndexUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let bedType = result.data
                $('#bedTypeId').val(bedType.id)
                $('#editTitle').val(bedType.title)
                $('#editDescription').val(bedType.description)
                $('#editBedTypeModal').modal('show')
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenSubmit('#addNewBedTypeForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $(loadingButton).attr('disabled', true);
    $.ajax({
        url: $('#bedTypesCreateURL').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(loadingButton).attr('disabled', false);
                $('#addBedTypeModal').modal('hide');
                livewire.emit('refresh');
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result);
            $(loadingButton).attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
})

listenSubmit('#editBedTypeForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    $(loadingButton).attr('disabled', true);
    var id = $('#bedTypeId').val();
    $.ajax({
        url: $('#bedTypeIndexUrl').val() + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editBedTypeModal').modal('hide');
                livewire.emit('refresh');
                $(loadingButton).attr('disabled', false);
            }
        },
        error: function (result) {
            UnprocessableInputError(result);
            $(loadingButton).attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
})

listenHiddenBsModal('#addBedTypeModal', function () {
    resetModalForm('#addNewBedTypeForm', '#validationErrorsBox');
    $('#btnSave').attr('disabled', false);
})

listenHiddenBsModal('#editBedTypeModal', function () {
    resetModalForm('#editBedTypeForm', '#editValidationErrorsBox');
    $('#btnEditSave').attr('disabled', false);
})
