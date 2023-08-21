'use strict';
document.addEventListener('turbo:load', loadBloodDonations)

function loadBloodDonations() {
    $('#bloodDonationsDonorName').select2({
        width: '100%',
        dropdownParent: $('#bloodDonationsAddModal')
    });
    $('#bloodDonationsEditDonorName').select2({
        width: '100%',
        dropdownParent: $('#bloodDonationsEditModal')
    });
    $('#bloodDonationsAddModal, #bloodDonationsEditModal').
        on('shown.bs.modal', function () {
            $('#bloodDonationsDonorName, #bloodDonationsEditDonorName:first').focus();
        });
}

listenSubmit('#bloodDonationsAddNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#bloodDonationsBtnSave');
    loadingButton.button('loading');
    $('#bloodDonationsBtnSave').attr('disabled', true);
    $.ajax({
        url: $('#bloodDonationCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#bloodDonationsAddModal').modal('hide');
                window.livewire.emit('refresh');
                setTimeout(function () {
                    loadingButton.button('reset');
                }, 2500);
                $('#bloodDonationsBtnSave').attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#bloodDonationsValidationErrorsBox', result);
            setTimeout(function () {
                loadingButton.button('reset');
            }, 2000);
            $('#bloodDonationsBtnSave').attr('disabled', false);
        },
    });
});

listenSubmit('#bloodDonationsEditForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#bloodDonationsEditBtnSave');
    loadingButton.button('loading');
    $('#bloodDonationsEditBtnSave').attr('disabled', true);
    let id = $('#bloodDonationId').val();
    $.ajax({
        url: $('#bloodDonationUrl').val() + '/' + id,
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#bloodDonationsEditModal').modal('hide');
                window.livewire.emit('refresh');
                $('#bloodDonationsEditBtnSave').attr('disabled', false);
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
            $('#bloodDonationsEditBtnSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});
listenHiddenBsModal('#bloodDonationsAddModal', function () {
    $('#bloodDonationsDonorName').val('').trigger('change.select2');
    resetModalForm('#bloodDonationsAddNewForm', '#bloodDonationsValidationErrorsBox');
    $('#bloodDonationsBtnSave').attr('disabled', false);
});

listenHiddenBsModal('#bloodDonationsEditModal', function () {
    resetModalForm('#bloodDonationsEditForm', '#bloodDonationsEditValidationErrorsBox');
    $('#bloodDonationsEditBtnSave').attr('disabled', false);
});

listenClick('.blood-donations-edit-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let bloodDonationId = $(event.currentTarget).attr('data-id');
    bloodDonationRenderData(bloodDonationId);
});

function bloodDonationRenderData(id) {
    $.ajax({ 
        url: $('#bloodDonationUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let bloodDonation = result.data;
                $('#bloodDonationId').val(bloodDonation.id);
                $('#bloodDonationsEditDonorName').val(bloodDonation.blood_donor_id);
                $('#bloodDonationsEditDonorName').trigger('change');
                $('#editBags').val(bloodDonation.bags);
                $('#bloodDonationsEditModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenClick('.blood-donations-delete-btn', function (event) {
    let bloodDonationId = $(event.currentTarget).attr('data-id');
    deleteItem(
        $('#bloodDonationUrl').val() + '/' + bloodDonationId,
        '#bloodDonationTable',
        $('#bloodDonationLang').val(),
    );
});


