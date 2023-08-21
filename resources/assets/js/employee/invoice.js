$('#invoice_status_filter').select2({
    width: '100%',
});

$(document).on('click', '#invoiceResetFilter', function () {
    $('#invoice_status_filter').val(2).trigger('change');
    hideDropdownManually('.dropdown-menu,#dropdownMenuButton1')
});
