<div id="showPatientCase" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.case.case_details') }}</h3>
                <button type="button" aria-label="Close" class="btn btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-4 mb-5">
                        <label for="case_id"
                               class="form-label">{{ __('messages.operation_report.case_id').(':') }}</label><br>
                        <span id="case_id"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="patient_name"
                               class="form-label">{{ __('messages.case.patient').(':') }}</label><br>
                        <span id="patient_name"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="patient_phone"
                               class="form-label">{{ __('messages.case.phone').(':') }}</label><br>
                        <span id="patient_phone"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="patient_doctor"
                               class="form-label">{{ __('messages.case.doctor').(':') }}</label><br>
                        <span id="patient_doctor"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="case_date"
                               class="form-label">{{ __('messages.case.case_date').(':') }}</label><br>
                        <span id="case_date"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="case_fee"
                               class="form-label">{{ __('messages.case.fee').(':') }}</label><br>
                        <span id="case_fee"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="created_on"
                               class="form-label">{{ __('messages.common.created_on').(':') }}</label><br>
                        <span id="created_on"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="updated_on"
                               class="form-label">{{ __('messages.common.last_updated').(':') }}</label><br>
                        <span id="updated_on"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="patientStatus"
                               class="form-label">{{ __('messages.common.status').(':') }}</label><br>
                        <span id="patientStatus"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="description"
                               class="form-label">{{ __('messages.common.description').(':') }}</label><br>
                        <span id="description"
                              class="showSpan"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
