'use strict';
document.addEventListener('turbo:load', loadBloodDonors)

function loadBloodDonors(){
    $('#bloodGroup').select2({
        width: '100%',
        dropdownParent: $('#bloodDonorsAddModal')
    });
    $('#editBloodGroup').select2({
        width: '100%',
        dropdownParent: $('#bloodDonorsEditModal')
    });
    let lastDonationDate = $('#lastDonationDate').flatpickr({
        format: 'YYYY-MM-DD HH:mm:ss',
        dateFormat: 'Y-m-d H:i',
        sideBySide: true,
        enableTime: true,
        locale: $('.userCurrentLanguage').val(),
    });

    let editLastDonationDate = $('#editLastDonationDate').flatpickr({
        // format: 'YYYY-MM-DD HH:mm:ss',
        dateFormat: 'Y-m-d H:i',
        sideBySide: true,
        // enableTime: true,
        locale: $('.userCurrentLanguage').val(),
    });
    listenClick('.blood-donors-edit-btn', function (event) {
        if ($('.ajaxCallIsRunning').val()) {
            return
        }
        ajaxCallInProgress();
        let bloodDonorId = $(event.currentTarget).attr('data-id');
        renderBloodDonor(bloodDonorId);
    });

    function renderBloodDonor(id) {
        $.ajax({
            url: $('#bloodDonorUrl').val() + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    let bloodDonor = result.data;
                    $('#bloodDonorId').val(bloodDonor.id);
                    $('#editName').val(bloodDonor.name);
                    $('#editAge').val(bloodDonor.age);
                    $('#male,#female').prop('checked', false);
                    if (bloodDonor.gender == 1) {
                        $('#female').prop('checked', true);
                    } else {
                        $('#male').prop('checked', true);
                    }
                    $('#editBloodGroup').val(bloodDonor.blood_group);
                    $('#editBloodGroup').trigger('change');
                    editLastDonationDate.setDate(bloodDonor.last_donate_date + 1)
                    $('#bloodDonorsEditModal').modal('show');
                    ajaxCallCompleted();
                }
            },
            error: function (result) {
                manageAjaxErrors(result);
            },
        });
    };
    
}

listenSubmit( '#bloodDonorsAddNewForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#bloodDonorsBtnSave');
    loadingButton.button('loading');
    $(loadingButton).attr('disabled', true);
    $.ajax({
        url: $('#bloodDonorCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#bloodDonorsAddModal').modal('hide');
                window.livewire.emit('refresh');
                $(loadingButton).attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#bloodDonorsValidationErrorsBox', result);
            $(loadingButton).attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

listenSubmit('#bloodDonorsEditForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#bloodDonorEditBtnSave');
    loadingButton.button('loading');
    $(loadingButton).attr('disabled', true);
    var id = $('#bloodDonorId').val();
    $.ajax({ 
        url: $('#bloodDonorUrl').val() + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#bloodDonorsEditModal').modal('hide');
                window.livewire.emit('refresh');
                $(loadingButton).attr('disabled', false);
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
            $(loadingButton).attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});
listenHiddenBsModal('#bloodDonorsAddModal', function () {
    resetModalForm('#bloodDonorsAddNewForm', '#bloodDonorsValidationErrorsBox');
    $('#bloodDonorsBtnSave').attr('disabled', false);
});

listenHiddenBsModal('#bloodDonorsEditModal', function () {
    resetModalForm('#bloodDonorsEditForm', '#bloodDonorsEditValidationErrorsBox');
    $('#bloodDonorEditBtnSave').attr('disabled', false);
});

listenClick('.blood-donors-delete-btn', function (event) {
    let bloodDonorId = $(event.currentTarget).attr('data-id');
    deleteItem(
        $('#bloodDonorUrl').val() + '/' + bloodDonorId,
        '#bloodDonorsTable',
        $('#bloodDonorLang').val(),
    );
});


