'use strict';

document.addEventListener('turbo:load', loadHospitalEnquiryData)

function loadHospitalEnquiryData() {
    if (!$('#contactUsGeneral').length) {
        return
    }

    $('#contactUsGeneral').selectize()
    
    if ($('#g-recaptcha').length) {
        grecaptcha.render('g-recaptcha', {
            'sitekey': $('#adminRecaptcha').val(),
        })
    }
}

listenSubmit('#enquiryCreateForm', function (e) {
    e.preventDefault()
    let response = ''
    if ($('.error-msg').text() !== '') {
        $('.phoneNumber').focus()
        return false
    }
    $.ajax({
        url: $('.enquiryURl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                setTimeout(function () {
                    $('#enquiryCreateForm')[0].reset()
                    $('.error-msg').addClass('d-none')
                    $('.valid-msg').addClass('d-none')
                    var $select = $('#contactUsGeneral').selectize()
                    var control = $select[0].selectize
                    control.setValue(1, true)
                }, 5000)
            } else {
                displayErrorMessage(result.message);
                setTimeout(function () {
                    $('#enquiryCreateForm')[0].reset()
                    $('.contactUsGeneral').val(1).trigger('change')
                    grecaptcha.reset()
                }, 5000);
            }
            setTimeout(function () {
                if ((typeof $('.isGoogleCaptchaEnabled').val() == undefined)
                    ? ''
                    : $('.isGoogleCaptchaEnabled').val()) {
                    grecaptcha.reset();
                }
            }, 5000);
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            setTimeout(function () {
                grecaptcha.reset()
            }, 5000);
        },
        complete: function () {
            // setTimeout(
            //     function(){$(".general").val("").change();},
            //     5000
            // );
            // $('.general').val("")
        },
    });
})

