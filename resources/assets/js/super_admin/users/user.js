document.addEventListener('turbo:load', loadSuperAdminUserData)

function loadSuperAdminUserData() {
    
}

listenChange('.superUserStatus', function (event) {
    let userId = $(event.currentTarget).attr('data-id');
    updateHospitalStatus(userId)
})

window.updateHospitalStatus = function (id) {
    $.ajax({
        url: $('#userIndexUrl').val() + '/' + id + '/active-deactive',
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

listenChange('.super-user-is-verified', function (event) {
    let userId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: $('#userIndexUrl').val() + '/' + userId + '/is-verified',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                livewire.emit('refresh')
            }
        },
    });
})

listenClick('.super-user-delete-btn', function (event) {
    let userId = $(event.currentTarget).attr('data-id');
    deleteItem($('#hospitalIndexUrl').val() + '/' + userId, '#superAdminUsersTable', 'Hospital');
})

listenClick('.user-hospital-impersonate', function () {
    let id = $(this).data('id')
    let element = document.createElement('a')
    element.setAttribute('href', $('#impersonateRoute').val() + '/' + id)
    document.body.appendChild(element)
    element.click()
    document.body.removeChild(element)
    $('.user-hospital-impersonate').prop('disabled', true)
})

listenClick('#resetHospitalFilter', function () {
    $('#hospitalStatusArr').val('').trigger('change')
    hideDropdownManually($('#hospitalFilterBtn'), $('.dropdown-menu'))
})

listenChange('#hospitalStatusArr', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})
