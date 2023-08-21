<div class="d-flex justify-content-end">
    @if(!empty($row->standard_charge))
        <span>{{ getCurrencySymbol().' '.number_format($row->standard_charge) }}</span>
    @else
        {{ __('messages.common.n/a') }}
    @endif
</div>
    

