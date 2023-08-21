document.addEventListener('turbo:load', loadSubscriptionCreateData)

function loadSubscriptionCreateData() {
    $('#subscriptionStatus').select2();

    $('#subscriptionEndsAt').flatpickr({
        dateFormat: 'Y-m-d H:i',
        defaultDate: $('#subscriptionEndAt').val(),
        minDate: $('#subscriptionEndAt').val(),
        enableTime: true,
        locale: $('.userCurrentLanguage').val(),
    });
    
    listenSubmit('#editSubscription', function () {
        $('#subscriptionBtnSave').attr('disabled', true);
    })
}
