listenClick('.payment-delete-btn', function (event) {
    let paymentId = $(event.currentTarget).attr('data-id');
    deleteItem($('#paymentURL').val() + '/' + paymentId, '#paymentsTbl', $('#paymentLang').val());
})

listenClick('.payment-show-btn', function (event) {
    let paymentId = $(event.currentTarget).attr('data-id');
    renderPaymentData(paymentId)
})

window.renderPaymentData = function (id) {
    $.ajax({
        url: $('#paymentShowURL').val() + '/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#payment_account').text(result.data.account.name)
                $('#payment_date').
                    text(moment(result.data.payment_date).
                        format('Mo MMM, YYYY'))
                $('#payment_pay_to').text(result.data.pay_to)
                $('#payment_amount').text(result.data.amount)
                $('#payment_created_on').
                    text(moment(result.data.created_at).fromNow())
                $('#payment_updated_on').
                    text(moment(result.data.updated_at).fromNow())
                $('#payment_description').text(result.data.description)
                $('#payment_description').css('overflow-wrap', 'break-word')

                setValueOfEmptySpan()
                $('#showPayment').appendTo('body').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })

}

 
 
