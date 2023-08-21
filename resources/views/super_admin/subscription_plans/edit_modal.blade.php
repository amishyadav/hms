<div class="modal fade pr-0 overflow-hidden" id="editSubscriptionPlanModal" role="dialog"
     aria-labelledby="editSubscriptionPlanModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{__('messages.subscription_plans.edit_subscription_plan')}}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert-danger alert d-none" id="editValidationErrorsBox"></div>
                {{ Form::open(['id' =>'editSubscriptionForm','method'=>'post']) }}
                {{ Form::hidden('id', null, ['id' => 'subscriptionId']) }}
                <div class="row">

                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.subscription_plans.name').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('name', null , ['class' => 'form-control ','required','placeholder' => __('Entry Plan Name'),'id'=>'editName']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('currency', __('messages.subscription_plans.currency').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::select('currency', getCurrencyFullName(),null,['class' => 'form-select form-select-solid','data-control' =>'select2','id'=>'editCurrency','required','placeholder'=>'Select Currency']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('price', __('messages.subscription_plans.price').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('price', null , ['class' => 'form-control  price-input price','required','placeholder' => 'Enter price', 'id'=>'editPrice','maxlength' => '4']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('plan_type', __('messages.subscription_plans.plan_type').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::select('plan_type', $planType, null, ['required', 'id' => 'editPlanType','class' => 'form-select form-select-solid','data-control' =>'select2']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('valid_until', __('messages.subscription_plans.valid_until').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <span data-bs-toggle="tooltip"
                              data-placement="top"
                              data-bs-original-title="{{__('messages.subscription_plans.valid_until_tooltip')}}">
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
                        {{ Form::text('valid_until', null , ['class' => 'form-control  valid-until','required','maxlength' => '4','placeholder' => __('Enter valid until'),'id'=>'editValidUntil','onkeyup' => "if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"]) }}
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary me-2', 'id' => 'editSaveBtn', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    {{ Form::button(__('messages.common.cancel'), ['type' => 'button', 'class' => 'btn btn-light btn-active-light-primary me-2','data-bs-dismiss'=>'modal']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
