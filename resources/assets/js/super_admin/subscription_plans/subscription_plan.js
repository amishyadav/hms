document.addEventListener('turbo:load', loadSubscriptionPlanData)

function loadSubscriptionPlanData () {

}

listenClick('#resetSubscriptionPlanFilter', function () {
    $('#planTypeFilter').val('').trigger('change')
    hideDropdownManually($('#subscriptionPlanFilter'), $('.dropdown-menu'))
})

listenChange('#planTypeFilter', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenClick('.subscription-plan-delete-btn', function (e) {
    let subscriptionId = $(this).data('id')
    let deleteSubscriptionUrl = $('#subscriptionPlanUrl').val() + '/' +
        subscriptionId
    deleteItem(deleteSubscriptionUrl, '#subscriptionPlanTable',
        $('#adminSubscriptionPlanLang').val())
})

listenClick('.subscription_plan_is_default', function (event) {
    let subscriptionPlanId = $(event.currentTarget).attr('data-id')
    updateStatusToDefault(subscriptionPlanId)
})

window.updateStatusToDefault = function (id) {
    $.ajax({
        url: $('#subscriptionPlanUrl').val() + '/' + id +
            '/make-plan-as-default',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                livewire.emit('refresh')
            }
        },
    })
}

