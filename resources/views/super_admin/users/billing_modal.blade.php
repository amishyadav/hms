<div id="showBillingModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.billing_detail') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="row">
                    <div class="form-group col-sm-4 mb-5">
                        <label for="plan_name"
                               class="fw-bold text-muted mb-1">{{ __('messages.subscription_plans.plan_name').(':') }}</label><br>
                        <span id="plan_name"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="transaction"
                               class="fw-bold text-muted mb-1">{{ __('messages.subscription_plans.transaction').(':') }}</label><br>
                        <span id="transaction"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="amount"
                               class="fw-bold text-muted mb-1">{{ __('messages.subscription_plans.amount').(':') }}</label><br>
                        <span id="amount" class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5 text-break">
                        <label for="frequency"
                               class="fw-bold text-muted mb-1">{{ __('messages.subscription_plans.frequency').(':') }}</label><br>
                        <span id="frequency"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="start_date"
                               class="fw-bold text-muted mb-1">{{ __('messages.subscription_plans.start_date').(':') }}</label><br>
                        <span id="start_date"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="end_date"
                               class="fw-bold text-muted mb-1">{{ __('messages.subscription_plans.end_date').(':') }}</label><br>
                        <span id="end_date"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="trail_end_date"
                               class="fw-bold text-muted mb-1">{{ __('messages.subscription_plans.trail_end_date').(':') }}</label><br>
                        <span id="trail_end_date"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="status"
                               class="fw-bold text-muted mb-1">{{ __('messages.common.status').(':') }}</label><br>
                        <span id="status"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
