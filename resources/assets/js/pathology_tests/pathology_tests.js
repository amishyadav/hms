'use strict'

listenClick('.delete-pathology-test-btn', function (event) {
    let pathologyTestId = $(event.currentTarget).attr('data-id');
    deleteItem($('#pathologyTestURL').val() + '/' + pathologyTestId, '#pathologyTestsTable',
        $('#pathologyTestLang').val());
});

listenClick('.show-pathology-test-btn', function (event) {
    let pathologyTestId = $(event.currentTarget).attr('data-id');
    renderShowPathologyData(pathologyTestId)
});

window.renderShowPathologyData = function (id) {
    $.ajax({
        url: route('pathology.test.show.modal', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showPathologyTestName').text(result.data.test_name)
                $('#showPathologyTestShortName').text(result.data.short_name)
                $('#showPathologyTestType').text(result.data.test_type)
                $('#showPathologyCategories').
                    text(result.data.pathologycategory.name)
                $('#showPathologyTestUnit').text(result.data.unit)
                $('#showPathologyTestSubcategory').text(result.data.subcategory);
                $('#showPathologyTestMethod').text(result.data.method);
                $('#showPathologyTestReportDays').text(result.data.report_days);
                $('#showPathologyChargeCategories').text(result.data.chargecategory.name);
                $('#showPTestStandardCharge').text(result.data.standard_charge);
                $('#showPathologyTestCreatedOn').
                    text(moment(result.data.created_at).fromNow());
                $('#showPathologyTestUpdatedOn').
                    text(moment(result.data.updated_at).fromNow());

                setValueOfEmptySpan();
                $('#showPathologyTest').appendTo('body').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};
