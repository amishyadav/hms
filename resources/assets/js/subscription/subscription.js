document.addEventListener('turbo:load', loadSubscriptionsDate)

function loadSubscriptionsDate() {
    listenClick('#resetFilter', function () {
        $('#paymentTypeArr, #statusArr, #frequencyArr').val('').trigger('change')
        hideDropdownManually('.dropdown-menu,#dropdownMenuButton1')
    })
}

