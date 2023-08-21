listenClick('.delete-operation-reports-btn', function (event) {
    let operationReportId = $(event.currentTarget).attr('data-id');
    deleteItem($('#operationReportUrl').val() + '/' + operationReportId,
        '#operationReportsTable',
        $('#operationReportLang').val());
});

