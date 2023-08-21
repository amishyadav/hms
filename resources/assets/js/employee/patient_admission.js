listenClick('#admissionResetFilter', function () {
    $('#patient_admission_filter_status').val(2).trigger('change');
    hideDropdownManually('.dropdown-menu,#dropdownMenuButton1')
})


