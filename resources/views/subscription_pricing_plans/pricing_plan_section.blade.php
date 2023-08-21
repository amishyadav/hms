<div class="col-xl-4 col-md-6 d-flex align-items-stretch">
    <div class="card pricing-card text-center flex-fill">
        <div class="card-body px-10 py-14">
            <h3 class="text-gray-900 fs-2">{{ $subscriptionsPricingPlan->name }}</h3>
            <div class="d-flex justify-content-center mt-5">
                <h4 class="text-center mb-6 mt-2">
                    {{ getAdminCurrencySymbol($subscriptionsPricingPlan->currency) }}
                    <span class="fa-3x fw-bolder">{{ number_format($subscriptionsPricingPlan->price) }}</span>
                    <span class="h6 text-gray-800 ml-2">
                        /{{ \App\Models\SubscriptionPlan::PLAN_TYPE[$subscriptionsPricingPlan->frequency] }}
                    </span>
                </h4>
            </div>
            <ul class="pl-0 list-style-none">
                @if (isAuth() && count($subscriptionsPricingPlan->subscription) > 0)
                    @php
                        $activeSubscription = getCurrentActiveSubscriptionPlan();
                    @endphp
                    @if($activeSubscription && $activeSubscription->trial_ends_at != null && $activeSubscription->subscription_plan_id == $subscriptionsPricingPlan->id)
                        <li>
                            <h4>{{ __('messages.subscription_plans.valid_until') }}
                                : {{ $subscriptionsPricingPlan->trial_days }}
                            </h4>
                        </li>
                    @endif
                    @if($activeSubscription && isAuth() &&  $activeSubscription->subscriptionPlan->id == $subscriptionsPricingPlan->id)
                        <li>
                            <h4>
                                {{ __('messages.subscription_plans.end_date') }}
                                :
                                {{ getParseDate($activeSubscription->ends_at)->format('d-m-Y') }}
                            </h4>
                        </li>
                    @endif
                @endif
            </ul>
            @if(count($subscriptionsPricingPlan->planFeatures) > 0)
                <ul class="pricing-plan-features text-gray-600 fs-5 mb-9">
                    @foreach($subscriptionsPricingPlan->planFeatures as $planFeature)
                        <li><i class="fa-solid fa-check me-3"></i>{{ $planFeature->feature->name }}</li>
                        @if($planFeature->feature->name == "SMS / Mail" && ($planFeature->subscriptionPlan->sms_limit) > 0)
                            <li><i class="fa-solid fa-check me-3"></i>{{ $planFeature->subscriptionPlan->sms_limit }}
                                SMS
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
            @php
                $currentActiveSubscription = currentActiveSubscription();
            @endphp

            @if($currentActiveSubscription && $subscriptionsPricingPlan->id == $currentActiveSubscription->subscription_plan_id && !$currentActiveSubscription->isExpired())
                @if($subscriptionsPricingPlan->price != 0)
                    <button type="button"
                            class="btn btn-success rounded-pill"
                            data-id="{{ $subscriptionsPricingPlan->id }}">
                        {{ __('messages.subscription_pricing_plans.currently_active') }}</button>
                @else
                    <button type="button" class="btn btn-info rounded-pill">
                        {{ __('messages.subscription_pricing_plans.renew_free_plan') }}
                    </button>
                @endif
            @else
                @if($currentActiveSubscription && !$currentActiveSubscription->isExpired() && ($subscriptionsPricingPlan->price == 0 || $subscriptionsPricingPlan->price != 0))
                    @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                        <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', $subscriptionsPricingPlan->id) : 'javascript:void(0)' }}"
                           class="btn btn-primary rounded-pill {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                           data-id="{{ $subscriptionsPricingPlan->id }}"
                           data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                            {{ __('messages.subscription_pricing_plans.switch_plan') }}</a>
                    @else
                        <button type="button" class="btn btn-info rounded-pill">
                            {{ __('messages.subscription_pricing_plans.renew_free_plan') }}
                        </button>
                    @endif
                @else
                    @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                        <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', $subscriptionsPricingPlan->id) : 'javascript:void(0)' }}"
                           class="btn btn-primary rounded-pill{{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                           data-id="{{ $subscriptionsPricingPlan->id }}"
                           data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                            {{ __('messages.subscription_pricing_plans.choose_plan') }}</a>
                    @else
                        <button type="button" class="btn btn-info rounded-pill">
                            {{ __('messages.subscription_pricing_plans.renew_free_plan') }}
                        </button>
                    @endif
                @endif
            @endif
        </div>
    </div>
</div>

