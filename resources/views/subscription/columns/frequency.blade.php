@if($row->plan_frequency == 1)
    <span class="badge bg-light-success">{{\App\Models\Subscription::MONTH}}</span>
@elseif($row->plan_frequency == 2)
    <span class="badge bg-light-danger">{{ \App\Models\Subscription::YEAR }}</span>
@endif
