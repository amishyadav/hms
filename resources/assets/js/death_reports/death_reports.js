'use strict';

listenClick('.delete-death-report-btn', function (event) {
    let deathReportId = $(event.currentTarget).attr('data-id');
    deleteItem($('.deathReportUrl').val() + '/' + deathReportId,
        '#deathReportsTbl', $('#deathReportLang').val())
});
