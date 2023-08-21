document.addEventListener('turbo:load', loadAccountantCreateData)

function loadAccountantCreateData() {
    $('#accountantBloodGroup, #editAccountantBloodGroup').select2({
        width: '100%',
    });

    $('#accountantBirthDate, #editAccountantBirthDate').flatpickr({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        maxDate: new Date(),
        locale: $('.userCurrentLanguage').val(),
    });
    
    listenSubmit('#createAccountantForm, #editAccountantForm', function () {
        if ($('.error-msg').text() !== '') {
            $('.phoneNumber').focus();
            return false;
        }
    })

    $('#createAccountantForm, #editAccountantForm').find('input:text:visible:first').focus();
    
    listenClick('.remove-image', function () {
        defaultImagePreview('#previewImage', 1);
    })
    
}
