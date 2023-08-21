'use strict';
document.addEventListener('turbo:load', loadAmbulancesCreateEdit)

function loadAmbulancesCreateEdit(){
    $('#ambulancesVehicleType').select2({
        width: '100%',
    });

    listenSubmit( '#createAmbulanceForm, #editAmbulanceForm', function () {
            $('#ambulancesBtnSave').attr('disabled', true);

            if ($('#error-msg').text() !== '') {
                $('#phoneNumber').focus();
                $('#ambulancesBtnSave').attr('disabled', false);
                return false;
            }
        });

    $('#createAmbulanceForm, #editAmbulanceForm').
        find('input:text:visible:first').
        focus();
};
