<div class="d-flex justify-content-end me-5">
    @if(!empty($row->buying_price))
        <p class="cur-margin">{{ getCurrencySymbol().' '.number_format($row->buying_price,2) }} </p>
    @else
    {{ __('messages.common.n/a') }}
    @endif    
</div>

