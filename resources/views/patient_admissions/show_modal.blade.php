<div id="showPatientAdmission" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.patient_admission.details') }}</h2>
                <button type="button" aria-label="Close" class="btn btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionPatient_name"
                               class="form-label">{{ __('messages.case.patient').(':') }}</label><br>
                        <span id="showAdmissionPatient_name"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionDoctor_name"
                               class="form-label">{{ __('messages.case.doctor').(':') }}</label><br>
                        <span id="showAdmissionDoctor_name"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmission_id"
                               class="form-label">{{ __('messages.bill.admission_id').(':') }}</label><br>
                        <span id="showAdmission_id"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmission_date"
                               class="form-label">{{ __('messages.patient_admission.admission_date').(':') }}</label><br>
                        <span id="showAdmission_date"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionDischarge_date"
                               class="form-label">{{ __('messages.patient_admission.discharge_date').(':') }}</label><br>
                        <span id="showAdmissionDischarge_date"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionPackage"
                               class="form-label">{{ __('messages.patient_admission.package').(':') }}</label><br>
                        <span id="showAdmissionPackage"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionInsurance"
                               class="form-label">{{ __('messages.patient_admission.insurance').(':') }}</label><br>
                        <span id="showAdmissionInsurance"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmission_bed"
                               class="form-label">{{ __('messages.patient_admission.bed').(':') }}</label><br>
                        <span id="showAdmission_bed"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionPolicy_no"
                               class="form-label">{{ __('messages.patient_admission.policy_no').(':') }}</label><br>
                        <span id="showAdmissionPolicy_no"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionAgent_name"
                               class="form-label">{{ __('messages.patient_admission.agent_name').(':') }}</label><br>
                        <span id="showAdmissionAgent_name"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionGuardian_name"
                               class="form-label">{{ __('messages.patient_admission.guardian_name').(':') }}</label><br>
                        <span id="showAdmissionGuardian_name"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionGuardian_relation"
                               class="form-label">{{ __('messages.patient_admission.guardian_relation').(':') }}</label><br>
                        <span id="showAdmissionGuardian_relation"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionGuardian_contact"
                               class="form-label">{{ __('messages.patient_admission.guardian_contact').(':') }}</label><br>
                        <span id="showAdmissionGuardian_contact"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionGuardian_address"
                               class="form-label">{{ __('messages.patient_admission.guardian_address').(':') }}</label><br>
                        <span id="showAdmissionGuardian_address"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionPatient_status"
                               class="form-label">{{ __('messages.common.status').(':') }}</label><br>
                        <span id="showAdmissionPatient_status"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionCreated_on"
                               class="form-label">{{ __('messages.common.created_on').(':') }}</label><br>
                        <span id="showAdmissionCreated_on"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-3 mb-5">
                        <label for="showAdmissionUpdated_on"
                               class="form-label">{{ __('messages.common.last_updated').(':') }}</label><br>
                        <span id="showAdmissionUpdated_on"
                              class="showSpan"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
