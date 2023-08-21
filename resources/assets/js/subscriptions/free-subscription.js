window.addEventListener('turbo:load', loadPaymentMessageData)

function loadPaymentMessageData () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })
}

listenClick('.freePayment', function () {
    if (typeof $('.getLoggedInUserdata').val() != 'undefined' &&
        $('.getLoggedInUserdata').val() ==
        '') {
        window.location.href = $('.logInUrl').val()

        return true
    }

    if ($(this).data('plan-price') === 0) {
        $(this).addClass('disabled')
        let data = {
            plan_id: $(this).data('id'),
            price: $(this).data('plan-price'),
        }
        $.post($('.makePaymentURL').val(), data).done((result) => {
            let toastMessageData = {
                'toastType': 'success',
                'toastMessage': result.message,
            }
            freePaymentMessage(toastMessageData)
            setTimeout(function () {
                location.reload()
            }, 5000)
        }).catch(error => {
            $(this).html($('.subscribeText').val()).removeClass('disabled')
            $('.freePayment').attr('disabled', false)
            let toastMessageData = {
                'toastType': 'error',
                'toastMessage': error.responseJSON.message,
            }
            freePaymentMessage(toastMessageData)
        })

        return true
    }
})

listenClick('.freePayment', function () {
    if (typeof $('.getLoggedInUserdata').val() != 'undefined' &&
        $('.getLoggedInUserdata').val() ==
        '') {
        window.location.href = $('.logInUrl').val()

        return true
    }

    if ($(this).data('plan-price') === 0) {
        $(this).addClass('disabled')
        let data = {
            plan_id: $(this).data('id'),
            price: $(this).data('plan-price'),
        }
        $.post($('.makePaymentURL').val(), data).done((result) => {
            let toastMessageData = {
                'toastType': 'success',
                'toastMessage': result.message,
            }
            freePaymentMessage(toastMessageData)
            setTimeout(function () {
                location.reload()
            }, 5000)
        }).catch(error => {
            $(this).html($('.subscribeText').val()).removeClass('disabled')
            $('.freePayment').attr('disabled', false)
            let toastMessageData = {
                'toastType': 'error',
                'toastMessage': error.responseJSON.message,
            }
            freePaymentMessage(toastMessageData)
        })

        return true
    }
})

function freePaymentMessage (data = null) {
    // toastData = data != null ? data : toastData;
    toastData = data
    if (toastData !== null) {
        setTimeout(function () {
            $.toast({
                heading: toastData.toastType,
                icon: toastData.toastType,
                bgColor: '#7603f3',
                textColor: '#ffffff',
                text: toastData.toastMessage,
                position: 'top-right',
                stack: false,
            })
        }, 1000)
    }
}
