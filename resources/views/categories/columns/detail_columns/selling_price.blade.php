<div class="d-flex justify-content-end">
    @if(!empty($row->selling_price))
        <p class="cur-margin">{{ getCurrencySymbol().' '.number_format($row->selling_price) }} </p>
    @else
    {{ __('messages.common.n/a') }}
    @endif    
</div>

