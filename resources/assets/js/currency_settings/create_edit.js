document.addEventListener('torbo:load', loadCurrencySettingsDate)

function loadCurrencySettingsDate() {
    
}
listenSubmit('#addCurrencyForm', function (e){
    e.preventDefault()
    $.ajax({
        url: $('#indexCurrencyCreateUrl').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#add_currency_modal').modal('hide');
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    })
})

listenHiddenBsModal('#add_currency_modal', function () {
    resetModalForm('#addCurrencyForm');
});

listenClick('.currency-edit-btn', function (event){
    // console.log('button clicked')
    let currencyId = $(event.currentTarget).attr('data-id');
    renderCurrencyData(currencyId);
})

function renderCurrencyData(id)
{
    $.ajax({
        url: $('#indexCurrenciesUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            // console.log(result.data)
            if (result.success) {
                let currency = result.data;
                $('#editCurrencyId').val(currency.id);
                $('#editCurrencyName').val(currency.currency_name);
                $('#editCurrencyCode').val(currency.currency_code);
                $('#editCurrencyIcon').val(currency.currency_icon);
                $('#edit_currency_modal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
}

listenSubmit('#editCurrencyForm', function (e){
    e.preventDefault()
    var id = $('#editCurrencyId').val();
    $.ajax({
        url: $('#indexCurrenciesUrl').val() + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#edit_currency_modal').modal('hide')
                livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    });
})

listenClick('.currency-delete-btn', function (event) {
    let currencyId = $(event.currentTarget).attr('data-id');
    deleteItem($('#indexCurrenciesUrl').val() + '/' + currencyId, '',
        Lang.get('messages.subscription_plans.currency'));
});
