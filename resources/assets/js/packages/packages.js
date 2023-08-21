'use strict';

listenClick('.packages-delete-btn', function (event) {
    let packageId = $(event.currentTarget).attr('data-id');
    deleteItem(
        $('.packageReportUrl').val() + '/' + packageId,
        '#packagesReportTable',
        $('#packageLang').val());
});
