listenChange('#patientFilterStatus', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenChange('.patient-status', function (event) {
    let patientId = $(event.currentTarget).attr('data-id')
    updatePatientStatus(patientId)
})

listenClick('#resetPatientFilter', function () {
    $('#patientFilterStatus').val(0).trigger('change')
    hideDropdownManually($('#patientFilterBtn'), $('.dropdown-menu'))
})

listenClick('.delete-patient-btn', function (event) {
    let patientId = $(event.currentTarget).attr('data-id');
    deleteItem($('#indexPatientUrl').val() + '/' + patientId,
        '', $('#patientLang').val())
});

window.updatePatientStatus = function (id) {
    $.ajax({
        url: $('#indexPatientUrl').val() + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    });
};

// patient user email verify code
listenChange('.is-verified', function (event) {
    let userId = $(event.currentTarget).data('id')
    $.ajax({
        url: $('#userUrl').val() + '/' + userId + '/is-verified',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#patientsTable').DataTable().ajax.reload(null, false)
            }
        },
    })
})

