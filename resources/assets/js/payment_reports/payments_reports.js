document.addEventListener('turbo:load', loadPaymentReportDate)

function loadPaymentReportDate() {
    $('#filterPaymentAccount').select2({
        width: '100%',
    });
}

listenChange('#filterPaymentAccount', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenClick('#resetPaymentReportFilter', function () {
    $('#filterPaymentAccount').val(0).trigger('change');
    hideDropdownManually($('#paymentReportFilter'), $('.dropdown-menu'))
})
