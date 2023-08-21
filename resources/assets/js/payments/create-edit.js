document.addEventListener('turbo:load', loadCreatePaymentData)

function loadCreatePaymentData() {
    $('#paymentDate').flatpickr({
        dateFormat: 'Y-m-d',
        locale: $('.userCurrentLanguage').val(),
    });

    $('select').focus();

    $('.price-input').trigger('input');
}
