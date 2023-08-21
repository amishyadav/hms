'use strict';

listenClick('.delete-birth-report-btn', function (event) {
    let birthReportId = $(event.currentTarget).attr('data-id');
        deleteItem($('.birthReportUrl').val() + '/' + birthReportId,
            '#birthReportsTbl', $('#birthReportLang').val())
});
