@if($row->status == 1)
    <span class="badge bg-light-success">{{ \App\Models\Transaction::PAID }}</span>
@else
    N/A
@endif
