<div class="mt-2">
    @if(!empty($row->amount))
        <p class="cur-margin text-end me-5">{{ getCurrencySymbol().' '.number_format($row->amount) }}</p>
    @else
        N/A
    @endif
</div>

