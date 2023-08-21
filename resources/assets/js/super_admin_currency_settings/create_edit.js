document.addEventListener('torbo:load', loadSuperAdminCurrencySettingsData)

function loadSuperAdminCurrencySettingsData () {

}

listenSubmit('#addSuperAdminCurrencyForm', function (e) {
    e.preventDefault()
    $.ajax({
        url: $('#indexAdminCurrencyCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#add_admin_currency_modal').modal('hide')
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenHiddenBsModal('#add_admin_currency_modal', function () {
    resetModalForm('#addSuperAdminCurrencyForm')
})

listenClick('.admin-currency-edit-btn', function (event) {
    // console.log('button clicked')
    let currencyId = $(event.currentTarget).attr('data-id')
    renderAdminCurrencyData(currencyId)
})

function renderAdminCurrencyData (id) {
    $.ajax({
        url: $('#indexAdminCurrenciesUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            // console.log(result.data)
            if (result.success) {
                let currency = result.data
                $('#editAdminCurrencyId').val(currency.id)
                $('#editAdminCurrencyName').val(currency.currency_name)
                $('#editAdminCurrencyCode').val(currency.currency_code)
                $('#editAdminCurrencyIcon').val(currency.currency_icon)
                $('#edit_admin_currency_modal').modal('show')
                ajaxCallCompleted()
            }
        },
        error: function (result) {
            manageAjaxErrors(result)
        },
    })
}

listenSubmit('#editAdminCurrencyForm', function (e) {
    e.preventDefault()
    let id = $('#editAdminCurrencyId').val()
    $.ajax({
        url: $('#indexAdminCurrenciesUrl').val() + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#edit_admin_currency_modal').modal('hide')
                livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenClick('.admin-currency-delete-btn', function (event) {
    let currencyId = $(event.currentTarget).attr('data-id')
    deleteItem(route('super-admin-currency-settings.destroy', currencyId), '',
        Lang.get('messages.subscription_plans.currency'))
})
