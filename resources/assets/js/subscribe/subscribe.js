document.addEventListener('turbo:load', loadSubscribeDate)

function loadSubscribeDate() {
    listenClick('.subscribe-delete-btn', function () {
        let subscriberId = $(this).attr('data-id')
        deleteItem($('#superAdminSubscribeDestroy').val() + '/' + subscriberId, null,
            $('#subscribeLang').val())
    })
}

