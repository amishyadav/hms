@if(isset($row->transactionSubscription->subscriptionPlan))
    <p class="mb-0">{{  getAdminCurrencySymbol($row->transactionSubscription->subscriptionPlan->currency).' '. number_format($row->amount,2)}}</p>
@else
    <p class="mb-0">{{ '$'. number_format($row->amount,2)}}</p>
@endif
