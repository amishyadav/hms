listenClick('.case-handler-delete-btn', function (event) {
    let caseHandlerId = $(event.currentTarget).data('id')
    deleteItem($('#indexCaseHandlerUrl').val() + '/' + caseHandlerId,
        '#caseHandlersTbl',
        $('#caseHandlerLang').val())
})

listenChange('#caseHandlerHead', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
    hideDropdownManually($('#caseHandlerFilterBtn'), $('#caseHandlerFilter'))
})

listenChange('.case-handler-status', function (event) {
    let caseHandlerId = $(event.currentTarget).data('id')
    updateCaseHandlerStatus(caseHandlerId)
})

listenClick('#caseHandlerResetFilter', function () {
    $('#caseHandlerHead').val(2).trigger('change')
    hideDropdownManually($('#caseHandlerFilterBtn'), $('.dropdown-menu'))
})

window.updateCaseHandlerStatus = function (id) {
    $.ajax({
        url: $('#indexCaseHandlerUrl').val() + '/' + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                window.livewire.emit('refresh')
                // tbl.ajax.reload(null, false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}
 
