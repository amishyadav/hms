document.addEventListener('turbo:load', loadUserBillingData)

function loadUserBillingData() {
    
}

function searchDataTable (table, selector) {
    const filterSearch = document.querySelector(selector)
    filterSearch.addEventListener('keyup', function (e) {
        table.search(e.target.value).draw()
    })
}

listenClick('.billing-modal', function (event) {
    let userId = $(event.currentTarget).attr('data-id')
    renderBillingData(userId)
})

window.renderBillingData = function (id) {
    $.ajax({
        url: $('#superAdminHospitalBillingModalID').val() + '/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#plan_name').text(result.data[0].subscription_plan.name)
                $('#transaction').empty()
                if (result.data[0].transactions.payment_type == 1) {
                    $('#transaction').
                        append(
                            `<span class="badge bg-light-primary">${$('#userStripeType').val()}</span>`)
                } else {
                    $('#transaction').
                        append(
                            `<span class="badge bg-light-primary">${$('#userPaypalType').val()}</span>`)
                }
                $('#amount').text(result.data[0].plan_amount);
                $('#frequency').
                    text(result.data[0].plan_frequency == 1 ? $('#userSubscriptionMonth').val() : $('#userSubscriptionYear').val());
                $('#start_date').
                    text(moment(result.data[0].starts_at).format('Do MMM, Y'));
                $('#end_date').
                    text(moment(result.data[0].ends_at).format('Do MMM, Y'));
                if (result.data[0].trial_ends_at) {
                    $('#trail_end_date').
                        text(moment(result.data[0].trial_ends_at).
                            format('Do MMM, Y'));
                } else {
                    $('#trail_end_date').text('N/A');
                }
                $('#status').empty();
                if (result.data[0].status == 1) {
                    $('#status').
                        append(
                            `<span class="badge bg-light-success">${$('#userStatusActive').val()}</span>`)
                } else {
                    $('#status').
                        append(
                            `<span class="badge bg-light-danger">${$('#userStatusDeactive').val()}</span>`)
                }

                setValueOfEmptySpan()
                $('#showBillingModal').appendTo('body').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    });
};

listenClick('#hospitalBillsResetFilter', function () {
    $('#billingStatusArr, #billingPaymentType').val(0).trigger('change')
    hideDropdownManually($('#hospitalBillsFilterButton'), $('.dropdown-menu'))
})

listenChange('#billingStatusArr', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenChange('#billingPaymentType', function () {
    window.livewire.emit('changePaymentFilter', 'paymentFilter', $(this).val())
})
