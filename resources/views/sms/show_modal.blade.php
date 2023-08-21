<div id="showSms" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.sms.sms_details') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-6 mb-5">
                        <label for="sendTo"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.sms.send_to').(':') }}</label><br>
                        <span id="sendTo"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-5">
                        <label for="userSmsRole"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.employee_payroll.role').(':') }}</label><br>
                        <span id="userSmsRole"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-5">
                        <label for="smsPhone"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone').(':') }}</label><br>
                        <span id="smsPhone"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-5">
                        <label for="smsDate"
                               class="pb-2 fs-5 text-gray-600">{{  __('messages.sms.date').(':') }}</label><br>
                        <span id="smsDate"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-5">
                        <label for="sendBy"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.sms.send_by').(':') }}</label><br>
                        <span id="sendBy"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-5">
                        <label for="smsUpdatedOn"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':') }}</label><br>
                        <span id="smsUpdatedOn"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="smsMessage"
                               class="pb-2 fs-5 text-gray-600">{{ __('messages.sms.message').(':') }}</label><br>
                        <span id="smsMessage"
                              class="fs-5 text-gray-800 showSpan"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
