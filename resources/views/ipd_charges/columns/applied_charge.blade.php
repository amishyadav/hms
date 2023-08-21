<div class="d-flex justify-content-end">
    @if(!empty($row->applied_charge))
        <span>{{ getCurrencySymbol().' '.number_format($row->applied_charge) }}</span>
    @else
        {{ __('messages.common.n/a') }}
    @endif    
</div>

