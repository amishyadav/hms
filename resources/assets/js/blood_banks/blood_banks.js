'use strict';

listenSubmit( '#bloodBanksAddNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#bloodBanksBtnSave');
    loadingButton.button('loading');
    $(loadingButton).attr('disabled', true);
    $.ajax({
        url: $('#bloodBankCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                window.livewire.emit('refresh');
                displaySuccessMessage(result.message);
                $('#bloodBanksAddModal').modal('hide');
                $(loadingButton).attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#bloodBanksValidationErrorsBox', result);
            $(loadingButton).attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenSubmit( '#bloodBanksEditForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#bloodBanksEditBtnSave');
    loadingButton.button('loading');
    $(loadingButton).attr('disabled', true);
    var id = $('#bloodBankId').val();
    $.ajax({
        url: $('#bloodBankUrl').val() + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                window.livewire.emit('refresh');
                displaySuccessMessage(result.message);
                $('#bloodBanksEditModal').modal('hide');
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
});
listenHiddenBsModal('#bloodBanksAddModal', function () {
    $('#bloodBanksBtnSave').attr('disabled', false);
    resetModalForm('#bloodBanksAddNewForm', '#bloodBanksValidationErrorsBox');
});
listenHiddenBsModal('#bloodBanksEditModal', function () {
    $('#bloodBanksEditBtnSave').attr('disabled', false);
    resetModalForm('#bloodBanksEditForm', '#bloodBanksEditValidationErrorsBox');
});
listenClick('.blood-banks-edit-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let bloodGroupId = $(event.currentTarget).attr('data-id');
    renderBloodBanks(bloodGroupId);
});

 function renderBloodBanks(id) {
    $.ajax({
        url: $('#bloodBankUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let bloodGroup = result.data
                $('#bloodBankId').val(bloodGroup.id)
                $('#editBloodGroupBank').val(bloodGroup.blood_group)
                $('#editRemainedBags').val(bloodGroup.remained_bags)
                $('#bloodBanksEditModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};


 listenClick('.blood-banks-delete-btn', function (event) {
    let bloodGroupId = $(event.currentTarget).attr('data-id');
     deleteItem($('#bloodBankUrl').val() + '/' + bloodGroupId,
         '#bloodBankTable',
         $('#bloodBankLang').val())
});
