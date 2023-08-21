<span class="badge bg-light-{{$row->status == 1 ? 'success': 'danger'}}">{{$row->status == 1 ? \App\Models\Subscription::STATUS_ARR[1] : \App\Models\Subscription::STATUS_ARR[0]}}</span>
