@if($row->status == 1)
    <span class="badge bg-light-success">{{ \App\Models\Subscription::STATUS_ARR[1] }}</span>
@elseif($row->status == 0)
    <span class="badge bg-light-danger">{{ \App\Models\Subscription::STATUS_ARR[0] }}</span>
@endif
