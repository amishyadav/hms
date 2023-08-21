listenClick('.delete-pharmacist-btn', function (event) {
    let pharmacistId = $(event.currentTarget).attr('data-id')
    deleteItem($('#indexPharmacistUrl').val() + '/' + pharmacistId,
        '#pharmacistsTable',
        $('#pharmacistLang').val())
})

listenChange('#pharmacist_filter_status', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
    // $(tableName).DataTable().ajax.reload(null, true);
})

listenChange('.pharmacistStatus', function (event) {
    let pharmacistId = $(event.currentTarget).attr('data-id')
    updatePharmacistsStatus(pharmacistId)
})

listenClick('#pharmacistResetFilter', function () {
    $('#pharmacist_filter_status').val(0).trigger('change')
    hideDropdownManually($('#pharmacistsFilter'), $('.dropdown-menu'))
})

window.updatePharmacistsStatus = function (id) {
    $.ajax({
        url: $('#indexPharmacistUrl').val() + '/' + +id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                window.livewire.emit('refresh')
                // tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    });
};
