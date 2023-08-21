'use strict'

document.addEventListener('turbo:load', loadSMSData)

function loadSMSData () {
    $('#userSMSId, #roleSMSId').select2({
        width: '100%',
        dropdownParent: $('#AddSMSModal'),
    })

    $('.myclass').hide()
    $('#smsPhoneNumber').prop('required', false)
    $(document).on('click', '.smsNumber', function () {
        if ($('.smsNumber').is(':checked')) {
            $('.myclass').show()
            $('.smsNumber').attr('value', 1)
            $('.role').hide()
            $('#roleSMSId').prop('required', false)
            $('.send').hide()
            $('#userSMSId').prop('required', false)
            $('#smsPhoneNumber').prop('required', true)
        } else {
            $('#userSMSId').prop('required', true)
            $('#smsPhoneNumber').prop('required', false)
            hide()
        }
    })
}

listenClick('.show-sms-btn', function (event) {
    let smsId = $(event.currentTarget).attr('data-id')
    renderSmsData(smsId)
})

window.renderSmsData = function (id) {
    $.ajax({
        url: route('sms.show.modal', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#sendTo').
                    text(result.data.user
                        ? result.data.user.full_name
                        : 'N/A')
                $('#userSmsRole').
                    text(result.data.user
                        ? result.data.user.roles[0].name
                        : 'N/A')
                $('#smsPhone').text(result.data.phone_number)
                $('#sendBy').
                    text(result.data.send_by
                        ? result.data.send_by.full_name
                        : 'N/A')
                $('#high_blood_pressure').
                    text(result.data.high_blood_pressure)
                $('#smsMessage').text(result.data.message)
                $('#smsDate').
                    text(moment(result.data.created_at).fromNow())
                $('#smsUpdatedOn').
                    text(moment(result.data.updated_at).fromNow())

                setValueOfEmptySpan()
                $('#showSms').appendTo('body').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listen('keypress', '#messageId', function (e) {
    var tval = $('#messageId').val(),
        tlength = tval.length,
        set = 160,
        remain = parseInt(set - tlength)
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#messageId').val((tval).substring(0, tlength - 1))
        displayErrorMessage(
            'The message may not be greater than 160 characters.')
        // $('#validationErrorsBox').html('The message may not be greater than 160 characters.').
        //     show();
    }
})

listenSubmit('#addSMSNewForm', function (event) {
    event.preventDefault()
    var loadingButton = jQuery(this).find('#btnSMSSave')
    loadingButton.button('loading')
    $('#btnSMSSave').attr('disabled', true)
    if ($('#number').is(':checked')) {
        $('#roleSMSId').remove()
        $('#userSMSId').remove()
    }
    $.ajax({
        url: $('#createSmsUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#AddSMSModal').modal('hide')
                window.livewire.emit('refresh')
                // tbl.ajax.reload();
                // $('#btnSMSSave').attr('disabled', false);
            }
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result)
            $('#btnSMSSave').attr('disabled', false)
        },
        complete: function () {
            loadingButton.button('reset')
        },
    })
})

listenClick('.delete-sms-btn', function (event) {
    let id = $(event.currentTarget).attr('data-id')
    deleteItem($('#smsUrl').val() + '/' + id, '', $('#smsLang').val())
})

listenHiddenBsModal('#AddSMSModal', function () {
    resetModalForm('#addSMSNewForm', '#validationErrorsBox')
    $('#userSMSId').val('').trigger('change.select2')
    $('#roleSMSId').val('').trigger('change.select2')
    $('#valid-msg').addClass('hide')
    hide()
    $('#btnSMSSave').attr('disabled', false)
})

function hide () {
    $('.myclass').hide()
    $('.smsNumber').attr('value', 0)
    $('.role').show()
    $('.send').show()
}

listen('change', '#roleSMSId', function () {
    if ($(this).val() !== '') {
        $.ajax({
            url: $('#getUsersListUrl').val(),
            type: 'get',
            dataType: 'json',
            data: { id: $(this).val() },
            success: function (data) {
                $('#userSMSId').empty()
                $('#userSMSId').removeAttr('disabled')
                $.each(data.data, function (i, v) {
                    $('#userSMSId').
                        append($('<option></option>').attr('value', i).text(v))
                })
            },
        })
    }
    $('#userSMSId').empty()
    $('#userSMSId').prop('disabled', true)
})
