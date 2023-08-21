'use strict'
document.addEventListener('turbo:load', loadServicesCreateEdit)

function loadServicesCreateEdit () {
    $('#status').select2({
        width: '100%',
    })

    $('.price-input').trigger('input')

    $(window).on('beforeunload', function () {
        $('input[type=submit]').prop('disabled', 'disabled')
    })

    $('#createServiceForm, #editServiceForm').
        find('input:text:visible:first').
        focus()

    listenSubmit( '#createServiceForm', function () {
            $('#servicesBtnSave').attr('disabled', true)
        })
    listenSubmit( '#editServiceForm', function () {
        $('#editServicesBtnSave').attr('disabled', true)
    })
}
