
document.addEventListener('turbo:load', loadSubTransactionsData)

function loadSubTransactionsData() {
    
    listenChange('#paymentTypeArr', function () {
        window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
        // $(tableName).DataTable().ajax.reload(null, true);
    });
}

listenChange('.payment-approve', function () {
    let id = $(this).attr('data-id');
    let status = $(this).val();

    $.ajax({
        url: route('change-payment-status', id),
        type: 'GET',
        data: { id: id, status: status },
        success: function (result) {
            displaySuccessMessage(result.message);
            window.livewire.emit('refresh')
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listenClick('#transactionSideResetFilter', function () {
    $('#paymentTypeArr').val(5).trigger('change')
    hideDropdownManually($('#subscriptionTransaction'), $('.dropdown-menu'))
})
