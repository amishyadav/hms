<div id="showRadiologyTest" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.radiology_test.radiology_test_details') }}</h3>
                <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestName"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.test_name').(':') }}</label><br>
                        <span id="radiologyTestName"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestShortName"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.short_name').(':') }}</label><br>
                        <span id="radiologyTestShortName"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestType"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.test_type').(':') }}</label><br>
                        <span id="radiologyTestType"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestCategoryName"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.category_name').(':') }}</label><br>
                        <span id="radiologyTestCategoryName"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestSubCategory"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.subcategory').(':') }}</label><br>
                        <span id="radiologyTestSubCategory"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestReportDays"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.report_days').(':') }}</label><br>
                        <span id="radiologyTestReportDays"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestChargeCategory"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.charge_category').(':') }}</label><br>
                        <span id="radiologyTestChargeCategory"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestStandardCharge"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.standard_charge').(':') }}</label><br>
                        <span id="radiologyTestStandardCharge"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestCreatedOn"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').(':') }}</label><br>
                        <span id="radiologyTestCreatedOn"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="radiologyTestUpdatedOn"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':') }}</label><br>
                        <span id="radiologyTestUpdatedOn"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
