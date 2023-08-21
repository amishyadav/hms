'use strict';

listenClick('.delete-radiology-test-btn', function (event) {
    let radiologyTestId = $(event.currentTarget).attr('data-id');
    deleteItem($('#radiologyTestURL').val() + '/' + radiologyTestId, '#radiologyTestsTable',
        $('#radiologyTestLang').val()
    );
});

listenClick('.show-radiology-test-btn', function (event) {
    let radiologyTestId = $(event.currentTarget).attr('data-id');
    renderRadiologyTestData(radiologyTestId)
});

window.renderRadiologyTestData = function (id) {
    $.ajax({
        url: route('radiology.test.show.modal', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#radiologyTestName').text(result.data.test_name)
                $('#radiologyTestShortName').text(result.data.short_name)
                $('#radiologyTestType').text(result.data.test_type)
                $('#radiologyTestCategoryName').
                    text(result.data.radiologycategory.name)
                $('#radiologyTestSubCategory').text(result.data.subcategory)
                $('#radiologyTestReportDays').text(result.data.report_days);
                $('#radiologyTestChargeCategory').text(result.data.chargecategory.name);
                $('#radiologyTestStandardCharge').text(result.data.standard_charge);
                $('#radiologyTestCreatedOn').
                    text(moment(result.data.created_at).fromNow());
                $('#radiologyTestUpdatedOn').
                    text(moment(result.data.updated_at).fromNow());

                setValueOfEmptySpan();
                $('#showRadiologyTest').appendTo('body').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

