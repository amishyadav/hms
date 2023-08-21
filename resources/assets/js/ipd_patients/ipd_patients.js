listenChange('#ipd_patients_filter_status', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenClick('#ipdResetFilter', function () {
    $('#ipd_patients_filter_status').val('0').trigger('change')
    hideDropdownManually($('#ipdPatientDepartmentFilterBtn'),
        $('.dropdown-menu'))
})

listen('click', '.deleteIpdDepartmentBtn', function (event) {
    let ipdPatientId = $(event.currentTarget).attr('data-id')
    deleteItem($('#indexIpdPatientUrl').val() + '/' + ipdPatientId,
        '', $('#ipdPatientLang').val())
})
