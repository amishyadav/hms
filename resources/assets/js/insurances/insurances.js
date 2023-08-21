    listenClick('.insurances-delete-btn', function (event) {
        let insuranceId = $(event.currentTarget).attr('data-id')
        deleteItem($('#indexInsuranceUrl').val() + '/' + insuranceId,
            '#insurancesTbl', $('#insuranceLang').val())
    })

listenChange('.insuranceStatus', function (event) {
    let insuranceId = $(event.currentTarget).attr('data-id');
    updateInsuranceStatus(insuranceId);
});
listenClick('#insuranceResetFilter', function () {
    $('#filter_status').val(2).trigger('change');
});

window.updateInsuranceStatus = function (id) {
    $.ajax({
        url: $('#indexInsuranceUrl').val() + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    });
};


listenChange('#insurancesFilterStatus', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
});
listenClick('#insuranceResetFilter', function () {
    $('#insurancesFilterStatus').val(0).trigger('change');
    hideDropdownManually($('#insuranceFilterBtn'), $('.dropdown-menu'));
});
