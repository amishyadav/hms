'use strict'
document.addEventListener('turbo:load', loaBloodIssues)


function loaBloodIssues () {

    $('#bloodIssuesDoctorName,#bloodIssuesPatientName,#bloodIssuesDonorName,#bloodIssuesBloodGroup').
        select2({
            width: '100%',
            dropdownParent: $('#bloodIssuesAddModal'),
        })
    $('#editBloodIssueDoctorName,#editBloodIssuePatientName,#editBloodIssueDonorName,#editBloodIssueGroup').
        select2({
            width: '100%',
            dropdownParent: $('#bloodIssuesEditModal'),
        })
    
    let issueDate = $('#bloodIssueDate').flatpickr({
        enableTime: true,
        defaultDate: new Date(),
        maxDate: new Date(),
        dateFormat: 'Y-m-d H:i',
        locale: $('.userCurrentLanguage').val(),
    })

}

    listenSubmit('#bloodIssuesAddNewForm', function (event) {
        event.preventDefault()
        let loadingButton = jQuery(this).find('#bloodIssuesBtnSave')
        loadingButton.button('loading')
        $('#bloodIssuesBtnSave').attr('disabled', true)
        $.ajax({
            url: $('#bloodIssueCreateUrl').val(),
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message)
                    $('#bloodIssuesAddModal').modal('hide')
                    window.livewire.emit('refresh')
                    setTimeout(function () {
                        loadingButton.button('reset')
                    }, 2500)
                    $('#bloodIssuesBtnSave').attr('disabled', false)
                }
            },
            error: function (result) {
                printErrorMessage('#bloodIssuesValidationErrorsBox', result)
                setTimeout(function () {
                    loadingButton.button('reset')
                }, 2000)
                $('#bloodIssuesBtnSave').attr('disabled', false)
            },
        })
    })

    listenSubmit('#bloodIssuesEditForm', function (event) {
        event.preventDefault()
        let loadingButton = jQuery(this).find('#bloodIssuesEditBtnSave')
        loadingButton.button('loading')
        $('#bloodIssuesEditBtnSave').attr('disabled', true)
        let id = $('#bloodIssueId').val()
        $.ajax({
            url: $('#bloodIssueUrl').val() + '/' + id,
            type: 'post',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message)
                    $('#bloodIssuesEditModal').modal('hide')
                    window.livewire.emit('refresh')
                    $('#bloodIssuesEditBtnSave').attr('disabled', false)
                }
            },
            error: function (result) {
                manageAjaxErrors(result)
                $('#bloodIssuesEditBtnSave').attr('disabled', false)
            },
            complete: function () {
                loadingButton.button('reset')
            },
        })
    })

    listenClick('.blood-issues-edit-btn', function (event) {
        if ($('.ajaxCallIsRunning').val()) {
            return
        }
        ajaxCallInProgress()
        let bloodIssueId = $(event.currentTarget).attr('data-id')
        bloodIssueRenderData(bloodIssueId)
    })

    function bloodIssueRenderData (id) {
        $.ajax({
            url: $('#bloodIssueUrl').val() + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    let bloodIssue = result.data
                    $('#bloodIssueId').val(bloodIssue.id)
                    let editIssueDate = $('#editBloodIssueDate').flatpickr({
                        enableTime: true,
                        maxDate: new Date(),
                        dateFormat: 'Y-m-d H:i',
                        locale: $('.userCurrentLanguage').val(),
                    })
                    editIssueDate.setDate(bloodIssue.issue_date)
                    $('#editBloodIssueDoctorName').
                        val(bloodIssue.doctor_id).
                        trigger('change')
                    $('#editBloodIssuePatientName').
                        val(bloodIssue.patient_id).
                        trigger('change')
                    $('#editBloodIssueDonorName').
                        val(bloodIssue.donor_id).
                        trigger('change', [{ isEdit: true }])
                    $('#editBloodIssueAmount').val(bloodIssue.amount)
                    $('.price-input').trigger('input')
                    $('#editBloodIssueRemarks').val(bloodIssue.remarks)
                    $('#bloodIssuesEditModal').modal('show')
                    ajaxCallCompleted()
                }
            },
            error: function (result) {
                manageAjaxErrors(result)
            },
        })
    }

listenChange('#bloodIssuesDonorName', function () {
    changeBloodGroup('#bloodIssuesBloodGroup', $(this).val())
})

listenChange('#editBloodIssueDonorName', function () {
    changeBloodGroup('#editBloodIssueGroup', $(this).val())
})

function changeBloodGroup (selector, id) {
    $.ajax({
        url:$('#bloodGroupUrl').val(),
        type: 'get',
        dataType: 'json',
        data: { id: id },
        success: function (data) {
            $(selector).empty()
            $.each(data.data, function (i, v) {
                $(selector).
                    append($('<option></option>').attr('value', i).text(v))
            })
        },
    })
}

listenHiddenBsModal('#bloodIssuesAddModal', function () {
    $('#bloodIssuesBtnSave').attr('disabled', false)
    resetModalForm('#bloodIssuesAddNewForm', '#bloodIssuesValidationErrorsBox')
})

listenHiddenBsModal('#bloodIssuesEditModal', function () {
    $('#bloodIssuesDtnSave').attr('disabled', false)
    resetModalForm('#bloodIssuesEditForm', '#editValidationErrorsBox')
})

listenClick('.blood-issues-delete-btn', function (event) {
    let bloodIssueId = $(event.currentTarget).attr('data-id')
    deleteItem(
        $('#bloodIssueUrl').val() + '/' + bloodIssueId,
        '#bloodIssuesTable',
        $('#bloodIssueLang').val(),
    )
})
