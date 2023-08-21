<div class="d-flex align-items-center justify-content-end mt-2">
    @if(!empty($row->amount))
        <p class="cur-margin"> {{ getCurrencySymbol().' '.number_format($row->amount) }}</p>
    @else
        N/A
    @endif    
</div>

