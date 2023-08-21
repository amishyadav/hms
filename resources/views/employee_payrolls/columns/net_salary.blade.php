@if(!empty($row->net_salary))
    <p class="cur-margin mt-3">{{ getCurrencySymbol().' '.number_format($row->net_salary) }} </p>
@else
    N/A
@endif
