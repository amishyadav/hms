<p class="text-end my-auto">
    @if(!Empty($row->charge))
        {{getCurrencySymbol().' '.number_format($row->charge)}}
    @else
    {{ __('messages.common.n/a') }}
    @endif
</p>
 
