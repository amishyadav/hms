document.addEventListener('turbo:load', loadSuperAdminEnquiryData)

function loadSuperAdminEnquiryData() {
    listenClick('.super-admin-enquiry-delete-btn', function (e) {
        let id = $(e.currentTarget).data('id')
        deleteItem($('#enquiryIndexUrl').val() + '/' + id, '#superAdminEnquiriesTable', $('#adminEnquiryLang').val())
    })
    
    listenClick('#resetAdminEnquiryFilter', function () {
        $('#super_admin_enquiry_filter').val(2).trigger('change')
        hideDropdownManually($('#adminEnquiriesFilterBtn'), $('.dropdown-menu'))
    })
    
    listenChange('#super_admin_enquiry_filter', function () {
        window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
    })
}

