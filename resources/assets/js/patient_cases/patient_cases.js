listenClick('.delete-patient-case-btn', function (event) {
    let caseId = $(event.currentTarget).attr('data-id')
    deleteItem($('#indexPatientCaseUrl').val() + '/' + caseId, '#casesTbl', $('#patientCaseLang').val())
})

listenChange('#caseHead', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenClick('#caseResetFilter', function () {
    $('#caseHead').val(0).trigger('change')
    hideDropdownManually($('#caseFilterBtn'), $('.dropdown-menu'))
})

// status activation deactivation change event
listenChange('.patientCaseStatus', function (event) {
    let caseId = $(event.currentTarget).attr('data-id')
    caseActiveDeActiveStatus(caseId)
})

// activate de-activate Status
window.caseActiveDeActiveStatus = function (id) {
    $.ajax({
        url: $('#indexPatientCaseUrl').val() + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
};

listenClick('.show-patient-case-btn', function (event) {
    let patientCaseId = $(event.currentTarget).attr('data-id')
    renderPatientCaseData(patientCaseId)
})

window.renderPatientCaseData = function (id) {
    $.ajax({
        url: $('#patientCaseShowModal').val() + '/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#case_id').text(result.data.case_id)
                $('#patient_name').text(result.data.patient.patient_user.full_name)
                $('#patient_phone').text(result.data.phone)
                $('#patient_doctor').text(result.data.doctor.doctor_user.full_name)
                $('#case_date').
                    text(moment(result.data.date).format('Do MMM, Y h:mm A'))
                $('#case_fee').
                    text($('#currentCurrency').val() + ' ' + addCommas(result.data.fee))
                $('#description').text(result.data.description)
                $('#patientStatus').empty()
                if (result.data.status == 1) {
                    $('#patientStatus').
                        append(
                            `<span class="badge bg-light-success">${Lang.get('messages.filter.active')}</span>`)
                } else {
                    $('#patientStatus').
                        append(
                            `<span class="badge bg-light-danger">${Lang.get('messages.filter.deactive')}</span>`)
                }
                $('#created_on').
                    text(moment(result.data.created_at).fromNow())
                $('#updated_on').
                    text(moment(result.data.updated_at).fromNow())

                setValueOfEmptySpan()
                $('#showPatientCase').appendTo('body').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    });
};
    
