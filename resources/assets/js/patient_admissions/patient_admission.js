listenClick('.delete-patient-admission-btn', function (event) {
    let id = $(event.currentTarget).attr('data-id')
    deleteItem($('#indexPatientAdmissionsUrl').val() + '/' + id, '',
        $('#patientAdmissionLang').val())
})

listenChange('#patient_admission_filter_status', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenChange('.patientAdmissionStatus', function (event) {
    let id = $(event.currentTarget).attr('data-id')
    updatePatientAdmissionStatus(id)
})
listenClick('.show-patient-admission-btn', function (event) {
    let patientAdmissionId = $(event.currentTarget).attr('data-id')
    renderPatientAdmissionData(patientAdmissionId)
})

window.renderPatientAdmissionData = function (id) {
    $.ajax({
        url: $('#patientAdmissionsShowModal').val() + '/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showAdmissionPatient_name').
                    text(result.data.patient.patient_user.full_name)
                $('#showAdmissionDoctor_name').
                    text(result.data.doctor.doctor_user.full_name)
                $('#showAdmission_id').text(result.data.patient_admission_id)
                $('#showAdmission_date').text(result.data.admission_date)
                $('#showAdmissionDischarge_date').
                    text(result.data.discharge_date)
                $('#showAdmissionPackage').
                    text(
                        result.data.package ? result.data.package.name : 'N/A')
                $('#showAdmissionInsurance').
                    text(result.data.insurance
                        ? result.data.insurance.name
                        : 'N/A')
                $('#showAdmission_bed').
                    text(result.data.bed ? result.data.bed.name : 'N/A')
                $('#showAdmissionPolicy_no').text(result.data.policy_no)
                $('#showAdmissionAgent_name').text(result.data.agent_name)
                $('#showAdmissionGuardian_name').
                    text(result.data.guardian_name)
                $('#showAdmissionGuardian_relation').
                    text(result.data.guardian_relation)
                $('#showAdmissionGuardian_contact').
                    text(result.data.guardian_contact)
                $('#showAdmissionGuardian_address').
                    text(result.data.guardian_address)
                $('#showAdmissionPatient_status').empty()
                if (result.data.status == 1) {
                    $('#showAdmissionPatient_status').
                        append(
                            `<span class="badge bg-light-success">${Lang.get('messages.filter.active')}</span>`)
                } else {
                    $('#showAdmissionPatient_status').
                        append(
                            `<span class="badge bg-light-danger">${Lang.get('messages.filter.deactive')}</span>`)
                }
                $('#showAdmissionCreated_on').
                    text(moment(result.data.created_at).fromNow())
                $('#showAdmissionUpdated_on').
                    text(moment(result.data.updated_at).fromNow())

                setValueOfEmptySpan()
                $('#showPatientAdmission').appendTo('body').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenClick('#patientAdmissionResetFilter', function () {
    $('#patient_admission_filter_status').val(0).trigger('change')
    hideDropdownManually($('#patientAdmissionFilterBtn'), $('.dropdown-menu'))
})

window.updatePatientAdmissionStatus = function (id) {
    $.ajax({
        url: $('#indexPatientAdmissionsUrl').val() + '/' + +id +
            '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                livewire.emit('refresh')
                // tbl.ajax.reload(null, false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}
 
