<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('name', __('messages.subscription_plans.name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ $subscriptionPlan->name }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('currency', __('messages.subscription_plans.currency').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ strtoupper($subscriptionPlan->currency) }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('price', __('messages.subscription_plans.price').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ getAdminCurrencySymbol($subscriptionPlan->currency) }} {{ number_format($subscriptionPlan->price) }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('plan_type', __('messages.subscription_plans.plan_type').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <p class="m-0">
            @if($subscriptionPlan->frequency == \App\Models\SubscriptionPlan::MONTH)
                <span class="badge fs-6 bg-light-info">{{ \App\Models\SubscriptionPLAN::PLAN_TYPE[$subscriptionPlan->frequency] }}</span>
            @elseif($subscriptionPlan->frequency == \App\Models\SubscriptionPlan::YEAR)
                <span class="badge fs-6 bg-light-primary">{{ \App\Models\SubscriptionPLAN::PLAN_TYPE[$subscriptionPlan->frequency] }}</span>
            @else
                {{ __('messages.common.n/a') }}
            @endif
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('valid_until', __('messages.subscription_plans.valid_until').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">
                                    {{ $subscriptionPlan->trial_days != 0 ? $subscriptionPlan->trial_days : __('messages.common.n/a') }}
                                </span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('active_plan', __('messages.subscription_plans.active_plan').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">
                                    {{ $subscriptionPlan->subscription->count() }}
                                </span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($subscriptionPlan->created_at)) }}">{{ $subscriptionPlan->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($subscriptionPlan->updated_at)) }}">{{ $subscriptionPlan->updated_at->diffForHumans() }}</span>
    </div>
    @if($subscriptionPlan->features->count() > 0)
        <div class="separator my-5"></div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-md-10 mb-5">
                <h4 class="pb-2 fs-5 text-gray-600">{{ __('messages.subscription_plans.plan_features').(':') }}</h4>
            </div>
        </div>

        <div class="row">
            @foreach($subscriptionPlan->features as $planFeature)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                    <div class="d-flex">
                        <i class='fas fa-bullseye mt-1'></i> &nbsp;<span
                                class="fs-5 text-gray-800">{{ $planFeature->name }}</span>&nbsp;&nbsp;
                        @if($planFeature->submenu != 0)
                            <span data-bs-toggle="tooltip"
                                  data-placement="top"
                                  data-bs-original-title="{{ __('messages.subscription_plans.default_plan_text_one') }}
                                  {{ $planFeature->submenu }} {{ __('messages.subscription_plans.default_plan_text_two') }}">
                                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
