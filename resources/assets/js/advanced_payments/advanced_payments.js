document.addEventListener('turbo:load', loadAdvancedPaymentData)

function loadAdvancedPaymentData() {
    
}

listenClick('.advanced-payment-delete-btn', function (event) {
    let advancedPaymentId = $(event.currentTarget).attr('data-id');
    deleteItem($('.advancedPaymentURL').val() + '/' + advancedPaymentId,
        '#advancedPaymentsTable', $('#advancePaymentLang').val())
})
