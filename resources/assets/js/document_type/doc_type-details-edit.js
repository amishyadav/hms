'use strict';

listenClick('.editDocsTypeBtn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress()
    let docTypeId = $(event.currentTarget).attr('data-id')
    renderDocsTypeData(docTypeId)
})

function renderDocsTypeData (id) {
    $.ajax({
        url: $('#showDocTypeUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#docTypeId').val(result.data.id)
                $('#editDocTypeName').val(result.data.name)
                $('#edit_document_types_modal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
}

window.editDocumentTypeRecordWithForm = function (data, loadingButton) {
    let formData = (data.formSelector === '') ? data.formData : $(
        data.formSelector).serialize();
    $(loadingButton).attr('disabled', true);
    $.ajax({
        url: data.url,
        type: data.type,
        data: formData,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#edit_document_types_modal').modal('hide');
                setTimeout(function () {
                    window.location.reload();
                }, 3000);
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
};
