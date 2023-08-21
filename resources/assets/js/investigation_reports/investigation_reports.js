'use strict';

document.addEventListener('turbo:load', loadInvestigationReportData)

function  loadInvestigationReportData() {
    listenClick('#resetInReportFilter', function () {
        $('#filterInReportStatus').val(2).trigger('change');
        hideDropdownManually($('#investigationReportMenuButton'), $('.dropdown-menu'))
    });
    listenChange('#filterInReportStatus', function () {
        window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
    });
    listenClick('.delete-in-report-btn', function (event) {
        let investigationReportId = $(event.currentTarget).attr('data-id');
        deleteItem(
            $('#indexInvestigationReportUrl').val() + '/' +
            investigationReportId,
            '#investigationReportTable',
            $('#investigationReportLang').val(),
        );
    });
}
