<section class="plan-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-heading">
                    <h2 class="mb-0">{{__('messages.landing.choose_your_pricing_plan')}}</h2>
                </div>
            </div>
        </div>
        <ul class="nav nav-pills mb-3 switches-container bg-white " id="pills-tab" role="tablist">
            <li class="nav-item w-50 text-center" role="presentation">
                <button class="nav-link active w-100" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#monthContent" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">{{ __('messages.month') }}</button>
            </li>
            <li class="nav-item w-50 text-center" role="presentation">
                <button class="nav-link w-100" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#yearContent" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">{{ __('messages.year') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="monthContent" role="tabpanel"
                 aria-labelledby="month-tab">
                <div class="row justify-content-center">
                    @forelse($subscriptionPricingMonthPlans as $subscriptionsPricingPlan)
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="pricing-plan-card card mx-lg-2 h-100">
                                <div class="card-body p-0 text-center">
                                    <h3 class="mb-3 mt-4 pt-2">{{ $subscriptionsPricingPlan->name }}</h3>
                                    <div class="d-flex justify-content-center pb-4 pricing-text">
                                        <h2 class="text-cyan mb-0">
                                            {{ getAdminCurrencySymbol($subscriptionsPricingPlan->currency) }}</span>{{ number_format($subscriptionsPricingPlan->price) }}</h2>
                                        <p class="pt-xl-3 pt-lg-2 pt-1 mb-0 ms-1">
                                            /{{ \App\Models\SubscriptionPlan::PLAN_TYPE[$subscriptionsPricingPlan->frequency] }}</p>
                                    </div>
                                    <ul class="pricing-plan-features text-start px-2 pt-4 mt-2">
                                        @php
                                            $activeSubscription = getCurrentActiveSubscriptionPlan();
                                        @endphp
                                        @if (getLoggedInUser() != null && count($subscriptionsPricingPlan->subscription) > 0)
                                            @if($activeSubscription !== null && $activeSubscription->trial_ends_at != null && $activeSubscription->subscription_plan_id == $subscriptionsPricingPlan->id)
                                                <li class="active-check pb-3 text-start">
                                                    {{ __('messages.subscription_plans.valid_until') }}
                                                    : {{ $subscriptionsPricingPlan->trial_days }}

                                                </li>
                                            @endif

                                            @if($activeSubscription && isAuth() &&  $activeSubscription->subscriptionPlan->id == $subscriptionsPricingPlan->id)
                                                <li class="active-check pb-3 text-start">
                                                    {{ __('messages.subscription_plans.end_date') }}
                                                    :
                                                    {{ getParseDate($activeSubscription->ends_at)->format('d-m-Y') }}
                                                </li>
                                            @endif
                                        @endif
                                        @if(count($subscriptionsPricingPlan->planFeatures) > 0)
                                            @foreach($subscriptionsPricingPlan->planFeatures as $planFeature)
                                                <li class="active-check pb-3 text-start">
                                                                <span class="check-box bg-secondary">
                                                                    <i class="fa-solid fa-check text-white "></i>
                                                                </span> {{ $planFeature->feature->name }}
                                                </li>
                                                @if($planFeature->feature->name == "SMS / Mail" && ($planFeature->subscriptionPlan->sms_limit) > 0)
                                                    <li class="active-check pb-3 text-start">
                                                                <span class="check-box bg-secondary">
                                                                    <i class="fa-solid fa-check text-white "></i>
                                                                </span>
                                                        {{ $planFeature->subscriptionPlan->sms_limit }} SMS
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                    @php
                                        $currentActiveSubscription = currentActiveSubscription();
                                    @endphp
                                    <div class="mt-auto mb-4 pb-3">
                                        @if($currentActiveSubscription && isAuth() && $subscriptionsPricingPlan->id == $currentActiveSubscription->subscription_plan_id && !$currentActiveSubscription->isExpired())
                                            @if($subscriptionsPricingPlan->price != 0)
                                                <button type="button"
                                                        class="btn btn-primary px-70 pricing-plan-button-active"
                                                        data-id="{{ $subscriptionsPricingPlan->id }}">
                                                    <span>{{ __('messages.subscription_pricing_plans.currently_active') }}</span>
                                                </button>
                                            @else
                                                <button type="button"
                                                        class="btn btn-primary px-70 renew-free-plan">
                                                    <span>{{ __('messages.subscription_pricing_plans.renew_free_plan') }}</span>
                                                </button>
                                            @endif
                                        @else
                                            @if($currentActiveSubscription && isAuth() && !$currentActiveSubscription->isExpired() && ($subscriptionsPricingPlan->price == 0 || $subscriptionsPricingPlan->price != 0))
                                                @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                                                    <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', [$subscriptionsPricingPlan->id, 'landing', $screenFrom]) : 'javascript:void(0)' }}"
                                                       class="btn btn-primary px-70 {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                                                       data-id="{{ $subscriptionsPricingPlan->id }}"
                                                       data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                                                        <span>{{ __('messages.subscription_pricing_plans.switch_plan') }}</span></a>
                                                @else
                                                    <button type="button"
                                                            class="btn btn-primary px-70 renew-free-plan">
                                                        <span>{{ __('messages.subscription_pricing_plans.renew_free_plan') }}</span>
                                                    </button>
                                                @endif
                                            @else
                                                @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                                                    <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', [$subscriptionsPricingPlan->id, 'landing',$screenFrom]) : 'javascript:void(0)' }}"
                                                       class="btn btn-primary px-70 {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                                                       data-id="{{ $subscriptionsPricingPlan->id }}"
                                                       data-plan-price="{{ $subscriptionsPricingPlan->price }}"
                                                       data-turbo="false">
                                                        <span>{{ __('messages.subscription_pricing_plans.choose_plan') }}</span></a>
                                                @else
                                                    <button type="button"
                                                            class="btn btn-primary px-70 renew-free-plan">
                                                        <span>{{ __('messages.subscription_pricing_plans.renew_free_plan') }}</span>
                                                    </button>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4 class="mt-5 text-center">
                            {{ __('messages.subscription_month_plan_not_found') }}
                        </h4>
                    @endforelse
                </div>
            </div>
            <div class="tab-pane fade" id="yearContent" role="tabpanel"
                 aria-labelledby="month-tab">
                <div class="row justify-content-center">
                    @forelse($subscriptionPricingYearPlans as $subscriptionsPricingPlan)
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="pricing-plan-card card mx-lg-2 h-100">
                                <div class="card-body p-0 text-center">
                                    <h3 class="mb-3 mt-4 pt-2">{{ $subscriptionsPricingPlan->name }}</h3>
                                    <div class="d-flex justify-content-center pb-4 pricing-text">
                                        <h2 class="text-cyan mb-0">
                                            {{ getAdminCurrencySymbol($subscriptionsPricingPlan->currency) }}</span>{{ number_format($subscriptionsPricingPlan->price) }}</h2>
                                        <p class="pt-xl-3 pt-lg-2 pt-1 mb-0 ms-1">
                                            /{{ \App\Models\SubscriptionPlan::PLAN_TYPE[$subscriptionsPricingPlan->frequency] }}</p>
                                    </div>
                                    <ul class="pricing-plan-features text-start px-2 pt-4 mt-2">
                                        @php
                                            $activeSubscription = getCurrentActiveSubscriptionPlan();
                                        @endphp
                                        @if (getLoggedInUser() != null && count($subscriptionsPricingPlan->subscription) > 0)
                                            @if($activeSubscription !== null && $activeSubscription->trial_ends_at != null && $activeSubscription->subscription_plan_id == $subscriptionsPricingPlan->id)
                                                <li class="active-check pb-3 text-start">
                                                    {{ __('messages.subscription_plans.valid_until') }}
                                                    : {{ $subscriptionsPricingPlan->trial_days }}
                                                </li>
                                            @endif

                                            @if($activeSubscription && isAuth() &&  $activeSubscription->subscriptionPlan->id == $subscriptionsPricingPlan->id)
                                                <li class="active-check pb-3 text-start">
                                                    {{ __('messages.subscription_plans.end_date') }}
                                                    :
                                                    {{ getParseDate($activeSubscription->ends_at)->format('d-m-Y') }}
                                                </li>
                                            @endif
                                        @endif
                                        @if(count($subscriptionsPricingPlan->planFeatures) > 0)
                                            @foreach($subscriptionsPricingPlan->planFeatures as $planFeature)
                                                <li class="active-check pb-3 text-start">
                                                                        <span class="check-box bg-secondary">
                                                                            <i class="fa-solid fa-check text-white "></i>
                                                                        </span> {{ $planFeature->feature->name }}
                                                </li>
                                                @if($planFeature->feature->name == "SMS / Mail" && ($planFeature->subscriptionPlan->sms_limit) > 0)
                                                    <li class="active-check pb-3 text-start">
                                                                <span class="check-box bg-secondary">
                                                                    <i class="fa-solid fa-check text-white "></i>
                                                                </span>
                                                        {{ $planFeature->subscriptionPlan->sms_limit }} SMS
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                    @php
                                        $currentActiveSubscription = currentActiveSubscription();
                                    @endphp
                                    <div class="mt-auto mb-4 pb-3">
                                        @if($currentActiveSubscription && isAuth() && $subscriptionsPricingPlan->id == $currentActiveSubscription->subscription_plan_id && !$currentActiveSubscription->isExpired())
                                            @if($subscriptionsPricingPlan->price != 0)
                                                <button type="button"
                                                        class="btn btn-primary px-70 pricing-plan-button-active"
                                                        data-id="{{ $subscriptionsPricingPlan->id }}">
                                                    <span>{{ __('messages.subscription_pricing_plans.currently_active') }}</span>
                                                </button>
                                            @else
                                                <button type="button"
                                                        class="btn btn-primary px-70 renew-free-plan">
                                                    <span>{{ __('messages.subscription_pricing_plans.renew_free_plan') }}</span>
                                                </button>
                                            @endif
                                        @else
                                            @if($currentActiveSubscription && isAuth() && !$currentActiveSubscription->isExpired() && ($subscriptionsPricingPlan->price == 0 || $subscriptionsPricingPlan->price != 0))
                                                @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                                                    <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', [$subscriptionsPricingPlan->id, 'landing',$screenFrom]) : 'javascript:void(0)' }}"
                                                       class="btn btn-primary px-70 {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                                                       data-id="{{ $subscriptionsPricingPlan->id }}"
                                                       data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                                                        <span>{{ __('messages.subscription_pricing_plans.switch_plan') }}</span></a>
                                                @else
                                                    <button type="button"
                                                            class="btn btn-primary px-70 renew-free-plan">
                                                        <span>{{ __('messages.subscription_pricing_plans.renew_free_plan') }}</span>
                                                    </button>
                                                @endif
                                            @else
                                                @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                                                    <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', [$subscriptionsPricingPlan->id, 'landing',$screenFrom]) : 'javascript:void(0)' }}"
                                                       class="btn btn-primary px-70 {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                                                       data-id="{{ $subscriptionsPricingPlan->id }}"
                                                       data-plan-price="{{ $subscriptionsPricingPlan->price }}"
                                                       data-turbo="false">
                                                        <span>{{ __('messages.subscription_pricing_plans.choose_plan') }}</span></a>
                                                @else
                                                    <button type="button"
                                                            class="btn btn-primary px-70 renew-free-plan">
                                                        <span>{{ __('messages.subscription_pricing_plans.renew_free_plan') }}</span>
                                                    </button>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4 class="mt-5 text-center">
                            {{ __('messages.subscription_year_plan_not_found') }}
                        </h4>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
