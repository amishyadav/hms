document.addEventListener('turbo:load', loadCredentialData)

function loadCredentialData() {
    let StripeCheckbox = $('#stripeEnable').is(':checked')
    if (StripeCheckbox) {
        $('.stripe-div').removeClass('d-none')
    } else {
        $('.stripe-div').addClass('d-none')
    }

    let PaypalCheckbox = $('#paypalEnable').is(':checked')
    if (PaypalCheckbox) {
        $('.paypal-div').removeClass('d-none')
    } else {
        $('.paypal-div').addClass('d-none')
    }
    let razorpayCheckbox = $('#razorpayEnable').is(':checked')
    if (razorpayCheckbox) {
        $('.razorpay-div').removeClass('d-none')
    } else {
        $('.razorpay-div').addClass('d-none')
    }
}

listen('change', '#stripeEnable', function () {
    let StripeCheckbox = $('#stripeEnable').is(':checked')
    if (StripeCheckbox) {
        $('.stripe-div').removeClass('d-none')
    } else {
        $('.stripe-div').addClass('d-none')
    }
})
listen('change', '#paypalEnable', function () {
    let PaypalCheckbox = $('#paypalEnable').is(':checked')
    if (PaypalCheckbox) {
        $('.paypal-div').removeClass('d-none')
    } else {
        $('.paypal-div').addClass('d-none')
    }
})
listen('change', '#razorpayEnable', function () {
    let razorpayCheckbox = $('#razorpayEnable').is(':checked')
    if (razorpayCheckbox) {
        $('.razorpay-div').removeClass('d-none')
    } else {
        $('.razorpay-div').addClass('d-none')
    }
})
listenSubmit('#UserCredentialsSettings', function (e) {
    e.preventDefault()
    let StripeCheckbox = $('#stripeEnable').is(':checked')
    let PaypalCheckbox = $('#paypalEnable').is(':checked')
    let razorpayCheckbox = $('#razorpayEnable').is(':checked')
    if (StripeCheckbox && $('#stripeKey').val() == '') {
        displayErrorMessage('Please enter Stripe Key.')
        return false
    }
    if (StripeCheckbox && $('#stripeSecret').val() == '') {
        displayErrorMessage('Please enter Stripe Secret.')
        return false
    }
    if (PaypalCheckbox && $('#paypalKey').val() == '') {
        displayErrorMessage('Please enter Paypal Client Id.')
        return false
    }
    if (PaypalCheckbox && $('#paypalSecret').val() == '') {
        displayErrorMessage('Please enter Paypal Secret.')
        return false
    }
    if (PaypalCheckbox && $('#paypalMode').val() == '') {
        displayErrorMessage('Please enter Paypal Mode.')
        return false
    }
    if (razorpayCheckbox && $('#razorpayKey').val() == '') {
        displayErrorMessage('Please enter Razorpay Key.')
        return false
    }
    if (razorpayCheckbox && $('#razorpaySecret').val() == '') {
        displayErrorMessage('Please enter Razorpay Secret.')
        return false
    }

    $('#UserCredentialsSettings')[0].submit()
})
