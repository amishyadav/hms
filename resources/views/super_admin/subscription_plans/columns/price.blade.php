@if(isset($row->price))
    <p class="mb-0">{{ getAdminCurrencySymbol($row->currency) .' ' .number_format($row->price) }} </p>
@else
    N/A
@endif
