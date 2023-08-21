<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('user_full_name', __('messages.hospitals_list.hospital_name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ $subscription->user->full_name }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('subscription_plan_name', __('messages.subscription_plans.plan_name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <div class="d-flex">
            <span class="fs-5 text-gray-800">{{ $subscription->subscriptionPlan->name }}</span>&nbsp;&nbsp;
            @if($subscription->status == \App\Models\Subscription::ACTIVE)
                <span class="badge fs-6 bg-light-success">{{ __('messages.common.active') }}</span>
            @else
                <span class="badge fs-6 bg-light-danger">{{ __('messages.common.de_active') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('transaction_date', __('messages.subscription_plans.start_date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($subscription->starts_at)) }}">
                                    {{ date('g:i A jS M, Y', strtotime($subscription->starts_at)) }}
                                </span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('transaction_date', __('messages.subscription_plans.end_date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($subscription->ends_at)) }}">
                                    {{ date('g:i A jS M, Y', strtotime($subscription->ends_at)) }}
                                </span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('payment_status', __('messages.subscription_plans.frequency').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <p class="m-0">
            @if($subscription->plan_frequency == 1)
                <span class="badge fs-6 bg-light-success">{{ \App\Models\Subscription::MONTH }}</span>
            @elseif($subscription->plan_frequency == 2)
                <span class="badge fs-6 bg-light-danger">{{ \App\Models\Subscription::YEAR   }}</span>
            @else
                {{ __('messages.common.n/a') }}
            @endif
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('amount', __('messages.subscription_plans.amount').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ getAdminCurrencySymbol($subscription->subscriptionPlan->currency) }} {{ number_format($subscription->plan_amount) }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($subscription->created_at)) }}">{{ $subscription->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($subscription->updated_at)) }}">{{ $subscription->updated_at->diffForHumans() }}</span>
    </div>
</div>
