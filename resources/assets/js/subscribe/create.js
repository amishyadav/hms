'use strict';

document.addEventListener('turbo:load', loadSubscribersCreateData)

function loadSubscribersCreateData() {
    
    if($('#mc-form').length){
        $(document).on('click', function (event) {
                var target = $(event.target);
                var _mobileMenuOpen = $('.navbar-collapse').hasClass('show');
                if (_mobileMenuOpen === true && !target.hasClass('navbar-toggler')) {
                    $('button.navbar-toggler').click();
                }
            },
        );
    }
    else {
        return false
    }
    
}

listenSubmit('#mc-form', function (e) {
    e.preventDefault();
    let loadingButton = jQuery(this).find('#subscribeBtn');
    loadingButton.button('loading');
    $.ajax({
        url: $('#SuperAdminSubscribeForm').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                $('.ajax-message').css('display', 'block');
                $('.ajax-message').
                    html('<div class="gen alert alert-success">' +
                        result.message + '</div>').
                    delay(5000).
                    hide('slow');
                $('#mc-form')[0].reset();
            }
        },
        error: function (result) {
            $('.ajax-message').css('display', 'block');
            $('.ajax-message').
                html('<div class="err alert alert-danger">' +
                    result.responseJSON.message + '</div>').
                delay(5000).
                hide('slow');
            $('#mc-form')[0].reset();
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
})
