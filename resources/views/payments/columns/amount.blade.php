<div class="d-flex align-items-center justify-content-end mt-2">
    @if(!empty($row->amount))
        <p class="cur-margin me-5">{{ getCurrencySymbol().' '.number_format($row->amount) }}</p>
    @else
    @endif    
</div>

