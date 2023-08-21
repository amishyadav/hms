document.addEventListener('turbo:load', loadNurseData)

function loadNurseData () {
    if (!$('#createNurseForm').length && !$('#editNurseForm').length) {
        return
    }

    $('#nurseBloodGroup').select2({
        width: '100%',
    })
    $('#editNurseBloodGroup').select2({
        width: '100%',
    })
    $('.nurseBirthDate').flatpickr({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        maxDate: new Date(),
        locale: $('.userCurrentLanguage').val(),
    })
    $('#createNurseForm, #editNurseForm').
        find('input:text:visible:first').
        focus()

}

listenSubmit('#createNurseForm, #editNurseForm', function () {
    if ($('.error-msg').text() !== '') {
        $('.phoneNumber').focus()
        return false
    }
})

