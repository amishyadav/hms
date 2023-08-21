<div class="d-flex justify-content-end">
    @if($row->amount)
        {{ getCurrencySymbol().' '.number_format($row->amount )}}
    @else
        {{__('messages.common.n/a')}}
    @endif    
</div>

