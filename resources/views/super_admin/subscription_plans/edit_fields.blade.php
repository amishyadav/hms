<div class="row">
    {{-- Subscription Plan section starts --}}
    <div class="col-md-4 mb-5">
        <div class="form-group">
            {{ Form::label('name', __('messages.subscription_plans.name').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('name', null , ['class' => 'form-control','required','placeholder' => __('messages.subscription_plans.enter_plan_name'),'id'=>'name']) }}
        </div>
    </div>
    <div class="col-md-4 mb-5">
        <div class="form-group">
            {{ Form::label('currency', __('messages.subscription_plans.currency').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::select('currency', adminCurrencies(), null,['class' => 'form-select currency','data-control' =>'select2','id'=>'currency','placeholder'=>__('messages.subscription_plans.select_currency'), 'required']) }}
        </div>
    </div>
    <div class="col-md-4 mb-5">
        <div class="form-group">
            {{ Form::label('price', __('messages.subscription_plans.price').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('price', null , ['class' => 'form-control price-input price','placeholder' => __('messages.subscription_plans.enter_price'), 'id'=>'price','maxlength' => '4', 'required']) }}
        </div>
    </div>
    <div class="col-md-4 mb-5">
        <div class="form-group">
            {{ Form::label('frequency', __('messages.subscription_plans.plan_type').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::select('frequency', $planType, null, ['required', 'id' => 'planType','class' => 'form-select planType','data-control' =>'select2', 'required']) }}
        </div>
    </div>
    <div class="col-md-4 mb-5 hide_for_trail">
        <div class="form-group">
            {{ Form::label('trial_days', __('messages.subscription_plans.trail_plan').(':'), ['class' => 'form-label']) }}
            {{ Form::text('trial_days', null , ['class' => 'form-control price-input price','placeholder' => __('messages.subscription_plans.enter_trial_day'), 'id'=>'trialDays','maxlength' => '3']) }}
        </div>
    </div>

    <div class="col-md-4 mb-5 sms-limit-section">
        <div class="form-group">
            {{ Form::label('sms_limit', 'Sms Limit', ['class' => 'form-label']) }}
            {{ Form::text('sms_limit', null , ['class' => 'form-control','placeholder' =>  'Enter Sms Limit', 'id'=>'smsLimit','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
        </div>
    </div>

    {{-- Subscription Plan section ends --}}

    {{-- Subscription Plan Features starts here --}}
    @include('super_admin.subscription_plans.plan_features')
    {{-- Subscription Plan Features ends here --}}
</div>

<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'btnSave']) }}
    <a href="{{route('super.admin.subscription.plans.index')}}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
