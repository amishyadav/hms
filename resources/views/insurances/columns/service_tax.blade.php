<div class="d-flex justify-content-end">
@if(!empty($row->service_tax))
        <p class="cur-margin">  {{ getCurrencySymbol().' '.$row->service_tax }}</p>
@else
        N/A
@endif
</div>
