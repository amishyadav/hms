@if(!empty($row->net_salary))
    <p class="cur-margin text-end">{{ getCurrencySymbol().' '.number_format($row->net_salary) }} </p>
@else
    <p class="text-end">N/A</p>
@endif
