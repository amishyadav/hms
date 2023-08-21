document.addEventListener('turbo:load', loadSubscriptionData)

function loadSubscriptionData () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })

}

function paymentMessage(data = null) {
    // toastData = data != null ? data : toastData;
    toastData = data;
    if (toastData !== null) {
        setTimeout(function () {
            $.toast({
                heading: toastData.toastType,
                icon: toastData.toastType,
                bgColor: 'danger',
                textColor: '#ffffff',
                text: toastData.toastMessage,
                position: 'top-right',
                stack: false,
            });
        }, 1000);
    }
}

listenClick('.makePayment', function () {
    if (typeof $('.getLoggedInUserdata').val() != 'undefined' &&
        $('.getLoggedInUserdata').val() ==
        '') {
        window.location.href = $('.logInUrl').val()

        return true
    }

    let payloadData = {
        plan_id: $(this).data('id'),
        from_pricing: typeof $('.fromPricing').val() != 'undefined'
            ? $('.fromPricing').val()
            : null,
        price: $(this).data('plan-price'),
        payment_type: $('#paymentType option:selected').val(),
    }
    $(this).addClass('disabled')
    $.post($('.makePaymentURL').val(), payloadData).done((result) => {
        if (typeof result.data == 'undefined') {
            let toastMessageData = {
                'toastType': 'success',
                'toastMessage': result.message,
            }
            paymentMessage(toastMessageData)
            setTimeout(function () {
                window.location.href = $('.subscriptionPlans').val()
            }, 5000)

            return true
        }

        // let stripe = $('.stripe').val()
        let sessionId = result.data.sessionId
        stripe.redirectToCheckout({
            sessionId: sessionId,
        }).then(function (result) {
            $(this).html($('.subscribeText').val()).removeClass('disabled')
            $('.makePayment').attr('disabled', false)
            let toastMessageData = {
                'toastType': 'error',
                'toastMessage': result.responseJSON.message,
            }
            paymentMessage(toastMessageData)
        })
    }).catch(error => {
        $(this).html($('.subscribeText').val()).removeClass('disabled')
        $('.makePayment').attr('disabled', false)
        let toastMessageData = {
            'toastType': 'error',
            'toastMessage': error.responseJSON.message,
        }
        paymentMessage(toastMessageData)
    })
})

listenChange('#paymentType', function () {
    let paymentType = $(this).val()
    if (paymentType == 1) {
        $('.proceed-to-payment, .razorPayPayment, .cashPayment').
            addClass('d-none')
        $('.stripePayment').removeClass('d-none')
        $('.makePayment').attr('disabled', false)
    }
    if (paymentType == 2) {
        $('.proceed-to-payment, .razorPayPayment, .cashPayment').
            addClass('d-none')
        $('.paypalPayment').removeClass('d-none')
        $('.paymentByPaypal').attr('disabled', false)
    }
    if (paymentType == 3) {
        $('.proceed-to-payment, .paypalPayment, .cashPayment').
            addClass('d-none')
        $('.razorPayPayment').removeClass('d-none')
        $('.razor_pay_payment').attr('disabled', false)
    }
    if (paymentType == 4) {
        $('.proceed-to-payment, .paypalPayment, .razorPayPayment').
            addClass('d-none')
        $('.cashPayment').removeClass('d-none')
        $('.cash_payment').attr('disabled', false)
    }
})

listenClick('.paymentByPaypal', function () {
    let pricing = typeof $('.fromPricing').val() != 'undefined' ? $(
        '.fromPricing').val() : null
    $(this).addClass('disabled')
    $.ajax({
        type: 'GET',
        url: route('paypal.init'),
        data: {
            'planId': $(this).data('id'),
            'from_pricing': pricing,
            'payment_type': $('#paymentType option:selected').val(),
        },
        success: function (result) {
            if (result.url) {
                window.location.href = result.url
            }

            if (result.statusCode == 201) {
                let redirectTo = ''

                $.each(result.result.links,
                    function (key, val) {
                        if (val.rel == 'approve') {
                            redirectTo = val.href
                        }
                    })
                location.href = redirectTo
            }
        },
        error: function (result) {
        },
        complete: function () {
        },
    })
})

let options = {
    'key': $('.razorpayDataKey').val(),
    'amount': 1, //  100 refers to 1
    'currency': 'INR',
    'name': $('.razorpayDataName').val(),
    'order_id': '',
    'description': '',
    'image': $('.razorpayDataImage').val(), // logo here
    'callback_url': $('.razorpayDataCallBackURL').val(),
    'prefill': {
        'email': '', // recipient email here
        'name': '', // recipient name here
        'contact': '', // recipient phone here
    },
    'readonly': {
        'name': 'true',
        'email': 'true',
        'contact': 'true',
    },
    'modal': {
        'ondismiss': function () {
            $.ajax({
                type: 'POST',
                url: $('.razorpayPaymentFailed').val(),
                success: function (result) {
                    if (result.url) {
                        $.toast({
                            heading: 'Success',
                            icon: 'Success',
                            bgColor: '#7603f3',
                            textColor: '#ffffff',
                            text: 'Payment not completed.',
                            position: 'top-right',
                            stack: false,
                        })
                        setTimeout(function () {
                            window.location.href = result.url
                        }, 3000)
                    }
                },
                error: function (result) {
                    displayErrorMessage(result.responseJSON.message)
                },
            })
        },
    },
}


listenClick('.razor_pay_payment', function () {
    $(this).addClass('disabled')
    $.ajax({
        type: 'POST',
        url: $('.makeRazorpayURl').val(),
        data: {
            'plan_id': $(this).data('id'),
            'from_pricing': typeof $('.fromPricing').val() != 'undefined'
                ? $('.fromPricing').val()
                : null,
        },
        success: function (result) {
            if (result.url) {
                window.location.href = result.url
            }
            if (result.success) {
                let {
                    id,
                    amount,
                    name,
                    email,
                    contact,
                    planID,
                } = result.data
                options.amount = amount
                options.order_id = id
                options.prefill.name = name
                options.prefill.email = email
                options.prefill.contact = contact
                options.prefill.planID = planID
                let razorPay = new Razorpay(options)
                razorPay.open()
                razorPay.on('payment.failed', storeFailedPayment)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
        complete: function () {
        },
    })
})

function storeFailedPayment (response) {
    $.ajax({
        type: 'POST',
        url: $('.razorpayPaymentFailed').val(),
        data: {
            data: response,
        },
        success: function (result) {
            if (result.url) {
                window.location.href = result.url
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenClick('.cash_payment', function () {
    $(this).addClass('disabled')
    $.ajax({
        type: 'POST',
        url: $('.cashPaymentUrl').val(),
        data: {
            'plan_id': $(this).data('id'),
            'from_pricing': typeof $('.fromPricing').val() != 'undefined'
                ? $('.fromPricing').val()
                : null,
        },
        success: function (result) {
            if (result.url) {
                window.location.href = result.url
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
        complete: function () {
        },
    })
})

