document.addEventListener('turbo:load', loadBrandCreateData)

'use strict';

function loadBrandCreateData() {
    listenSubmit('#createBrandForm, #editBrandForm', function () {
        if ($('#error-msg').text() !== '') {
            $('#phoneNumber').focus();
            return false;
        }
    })
}

