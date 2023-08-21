@if ($row->status == 1) 
    <span class="badge bg-light-success">{{\App\Models\Transaction::PAID}}</span>
@elseif ($row->status == 0) 
    <span class="badge bg-light-danger">{{\App\Models\Transaction::UNPAID}}</span>
@endif
