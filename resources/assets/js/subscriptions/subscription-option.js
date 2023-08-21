document.addEventListener('turbo:load', loadSubscriptionOptionData)

function loadSubscriptionOptionData() {
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
    // console.log(options)
} 
