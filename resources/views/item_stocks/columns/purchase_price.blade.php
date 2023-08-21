<div class="d-flex justify-content-end">
@if($row->purchase_price)
        <span> {{getCurrencySymbol() . " " . $row->purchase_price}}</span>
@else
        {{__('messages.common.n/a')}}
@endif
</div>
