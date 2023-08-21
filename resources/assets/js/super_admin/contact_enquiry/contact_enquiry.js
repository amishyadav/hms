document.addEventListener('turbo:load', loadContactEnquiryData)

'use strict'

function loadContactEnquiryData () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })

    // function onloadCallback() {
        if ($('#g-recaptcha').length) {
            grecaptcha.render('g-recaptcha', {
                'sitekey': $('#superAdminEnquiryGRecaptcha').val(),
            })
        }
    // }
   
    if ($('#superAdminContactEnquiryForm').length) {
        listenSubmit('#superAdminContactEnquiryForm', function (e) {
            e.preventDefault()
            $('.ajax-message-contact').css('display', 'block')
            $('.ajax-message-contact').html('')
            $.ajax({
                url: $('#superAdminEnquiryStore').val(),
                type: 'POST',
                data: $(this).serialize(),
                success: function (result) {
                    if (result.success) {
                        // displaySuccessMessage('sadasads')
                        $('.ajax-message-contact').
                            html('<div class="gen alert alert-success">' +
                                result.message + '</div>').
                            delay(5000).
                            hide('slow')
                        $('#superAdminContactEnquiryForm')[0].reset()
                    } else {
                        $('.ajax-message-contact').
                            html('<div class="gen alert alert-danger">' +
                                result.message + '</div>').
                            delay(5000).
                            hide('slow')
                    }
                    grecaptcha.reset()
                },
                // error: function (result) {
                //     $('.ajax-message-contact').
                //         html('<div class="err alert alert-danger">' +
                //             result.responseJSON.message + '</div>').
                //         delay(5000).
                //         hide('slow');
                //     grecaptcha.reset();
                //     $('#superAdminContactEnquiryForm')[0].reset();
                // },
            })
        })
    } else {
        return false
    }
}
