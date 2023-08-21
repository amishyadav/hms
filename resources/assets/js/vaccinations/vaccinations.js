listenSubmit('#addVaccinatedNewForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#btnVSave')
    loadingButton.button('loading')
    $.ajax({
        url: $('#vaccinationCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#addVaccinatedModal').modal('hide')
                // $('#').DatvaccinationsTableaTable().ajax.reload(null, false);
                livewire.emit('refresh')
                setTimeout(function () {
                    loadingButton.button('reset')
                }, 2500)
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result)
            setTimeout(function () {
                loadingButton.button('reset')
            }, 2000)
        },
    })
})

listenHiddenBsModal('#addVaccinatedModal', function () {
    resetModalForm('#addVaccinatedNewForm', '#CreateVValidationErrorsBox')
})

listenClick('.edit-vaccinated-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress()
    let vaccinationId = $(event.currentTarget).attr('data-id')
    renderVaccinationData(vaccinationId)
})

window.renderVaccinationData = function (id) {
    $.ajax({
        url: $('#vaccinationUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let vaccination = result.data
                $('#vaccinationId').val(vaccination.id)
                $('#editVaccinatedName').val(vaccination.name)
                $('#editManufacturedBy').val(vaccination.manufactured_by)
                $('#editVaccinatedBrand').val(vaccination.brand)
                $('#editVaccinatedModal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
    })
}

listenSubmit('#editVaccinatedForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#btnEditVSave')
    loadingButton.button('loading')
    let id = $('#vaccinationId').val()
    $.ajax({
        url: $('#vaccinationUrl').val() + '/' + id + '/update',
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editVaccinatedModal').modal('hide')
                livewire.emit('refresh')
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
        complete: function () {
            loadingButton.button('reset')
        },
    })
})

listenClick('.delete-vaccination-btn', function (event) {
    let vaccinationId = $(event.currentTarget).attr('data-id')
    deleteItem($('#vaccinationUrl').val() + '/' + vaccinationId,
        '#vaccinationsTable',
        $('#vaccinationLang').val())
})
