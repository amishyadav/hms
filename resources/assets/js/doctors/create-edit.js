document.addEventListener('turbo:load', loadDoctorsCreateEdit)

function loadDoctorsCreateEdit () {

    if ($('#createDoctorForm').length || $('#editDoctorForm').length) {

        const doctorBloodGroupElement = $('#doctorBloodGroup')
        const editDoctorBloodGroupElement = $('#editDoctorBloodGroup')
        const departmentIdElement = $('#departmentId')
        const doctorsDepartmentIdElement = $('#doctorsDepartmentId')
        const editDoctorsDepartmentIdElement = $('#editDoctorsDepartmentId')
        const createDoctorFormElement = $('#createDoctorForm')
        const editDoctorFormElement = $('#editDoctorForm')
        const doctorBirthDateElement = $('#doctorBirthDate')
        const editDoctorBirthDateElement = $('#editDoctorBirthDate')

        if (doctorBloodGroupElement.length) {
            $('#doctorBloodGroup').select2({
                width: '100%',
            });
        }

        if (editDoctorBloodGroupElement.length) {
            $('#editDoctorBloodGroup').select2({
                width: '100%',
            });
        }

        if (departmentIdElement.length) {
            $('#departmentId').select2({
                width: '100%',
            });
        }

        if (doctorsDepartmentIdElement.length) {
            $('#doctorsDepartmentId').select2({
                width: '100%',
            });
        }

        if (editDoctorsDepartmentIdElement.length) {
            $('#editDoctorsDepartmentId').select2({
                width: '100%',
            });
        }

        if (createDoctorFormElement.length) {
            $('#createDoctorForm').find('input:text:visible:first').focus();
        }

        if (editDoctorFormElement.length) {
            $('#editDoctorForm').find('input:text:visible:first').focus();
        }

        if (doctorBirthDateElement.length) {
            $('#doctorBirthDate').flatpickr({
                maxDate: new Date(),
                locale: $('.userCurrentLanguage').val(),
            });
        }

        if (editDoctorBirthDateElement.length) {
            $('#editDoctorBirthDate').flatpickr({
                maxDate: new Date(),
                locale: $('.userCurrentLanguage').val(),
            });
        }

    } else {

        return false;

    }

}

listenKeyup('#doctorFacebookUrl,#editDoctorFacebookUrl', function () {
    this.value = this.value.toLowerCase();
});

listenKeyup('#doctorTwitterUrl,#editDoctorTwitterUrl', function () {
    this.value = this.value.toLowerCase();
});

listenKeyup('#doctorInstagramUrl,#editDoctorInstagramUrl', function () {
    this.value = this.value.toLowerCase();
});

listenKeyup('#doctorLinkedInUrl,#editDoctorLinkedInUrl', function () {
    this.value = this.value.toLowerCase();
});

listenSubmit('#createDoctorForm, #editDoctorForm', function () {
    if ($('.error-msg').text() !== '') {
        $('.phoneNumber').focus();
        return false;
    }
    let facebookUrl = $('.facebookUrl').val();
    let twitterUrl = $('.twitterUrl').val();
    let instagramUrl = $('.instagramUrl').val();
    let linkedInUrl = $('.linkedInUrl').val();
    Lang.setLocale($('.userCurrentLanguage').val())
    let facebookExp = new RegExp(
        /^(https?:\/\/)?((m{1}\.)?)?((w{2,3}\.)?)facebook.[a-z]{2,3}\/?.*/i);
    let twitterExp = new RegExp(
        /^(https?:\/\/)?((m{1}\.)?)?((w{2,3}\.)?)twitter\.[a-z]{2,3}\/?.*/i);
    let instagramUrlExp = new RegExp(
        /^(https?:\/\/)?((w{2,3}\.)?)instagram.[a-z]{2,3}\/?.*/i);
    let linkedInExp = new RegExp(
        /^(https?:\/\/)?((w{2,3}\.)?)linkedin\.[a-z]{2,3}\/?.*/i);

    let facebookCheck = (facebookUrl == '' ? true : (facebookUrl.match(facebookExp) ? true : false));
    if (!facebookCheck) {
        displayErrorMessage(Lang.get('messages.common.please_enter_valid_facebook_url'));
        return false;
    }
    let twitterCheck = (twitterUrl == '' ? true : (twitterUrl.match(twitterExp)
        ? true
        : false));
    if (!twitterCheck) {
        displayErrorMessage(Lang.get('messages.common.please_enter_valid_twitter_url'));
        return false;
    }
    let instagramCheck = (instagramUrl == '' ? true : (instagramUrl.match(
        instagramUrlExp) ? true : false));
    if (!instagramCheck) {
        displayErrorMessage(Lang.get('messages.common.please_enter_valid_Instagram_url'));
        return false;
    }
    let linkedInCheck = (linkedInUrl == '' ? true : (linkedInUrl.match(
        linkedInExp) ? true : false));
    if (!linkedInCheck) {
        displayErrorMessage(Lang.get('messages.common.please_enter_valid_linkedin_url'));
        return false;
    }
});

listenClick('.doctor-remove-image', function () {
    defaultImagePreview('.previewImage', 1);
});

    

 
