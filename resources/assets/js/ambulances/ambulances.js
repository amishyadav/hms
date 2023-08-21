'use strict'
document.addEventListener('turbo:load', loadAmbulances)

function loadAmbulances () {
    listenClick( '.ambulances-delete-btn', function (event) {
    let ambulanceId = $(event.currentTarget).attr('data-id');
    deleteItem(route('ambulances.destroy', ambulanceId), '#ambulancesTbl',
        $('#ambulanceLang').val())
});
    listenChange( '#ambulancesFilterStatus', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
});
    
    listenClick( '#ambulancesResetFilter', function () {
    $('#ambulancesFilterStatus').val(0).trigger('change');
    hideDropdownManually($('#ambulancesFilterBtn'), $('.dropdown-menu'))
});
}

listenChange( '.ambulances-status', function (event) {
    let ambulanceId = $(event.currentTarget).attr('data-id');
    updateIsAvailable(ambulanceId);
});

window.updateIsAvailable = function (id) {
    $.ajax({
        url: route('ambulances.isAvailableAmbulance',id),
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
            }
        },
    });
};

