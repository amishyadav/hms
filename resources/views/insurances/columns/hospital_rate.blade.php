<div class="d-flex justify-content-end">
@if(!empty($row->hospital_rate))
        <p class="cur-margin">  {{ getCurrencySymbol().' '.$row->hospital_rate }}</p>
@else
        N/A
@endif
</div>
