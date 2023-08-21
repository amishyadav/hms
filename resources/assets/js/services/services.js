'use strict'
document.addEventListener('turbo:load', loadServicesCreateEdit)

function loadServicesCreateEdit () {
    
    listenChange('#servicesFilterStatus', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
});
    listenClick( '#servicesResetFilter', function () {
    $('#servicesFilterStatus').val(0).trigger('change');
    hideDropdownManually($('#servicesFilterBtn'), $('.dropdown-menu'))
});

}

listenClick( '.services-delete-btn', function (event) {
    let serviceId = $(event.currentTarget).attr('data-id')
    deleteItem(
        $('#showServiceReportUrl').val() + '/' + serviceId,
        '#servicesReportTable',
        $('#serviceLang').val(),
    )
})

listenChange( '.service-status', function (event) {
    let serviceId = $(event.currentTarget).attr('data-id');
    updateServiceStatus(serviceId);
});

window.updateServiceStatus = function (id) {
    $.ajax({
        url: $('#showServiceReportUrl').val() + '/' + id + '/active-deactive',
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
