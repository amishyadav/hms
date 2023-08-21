document.addEventListener('turbo:load', loadSuperAdminHospitalData)

function loadSuperAdminHospitalData() {
    listenSubmit('#createHospitalUserForm, #editHospitalUserForm', function () {
        if ($('.error-msg').text() !== '') {
            $('.phoneNumber').focus();
            return false;
        }
        $('.alert').delay(5000).slideUp(300);
    })
}
