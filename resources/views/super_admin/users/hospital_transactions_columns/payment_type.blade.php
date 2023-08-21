@if ($row->payment_type == 1)
    <a data-id="{{$row->payment_type}}"
       class="badge bg-light-primary text-decoration-none">{{\App\Models\Subscription::PAYMENT_TYPES[1] }}</a>
@elseif ($row->payment_type == 2)
    <a data-id="{{$row->payment_type}}"
       class="badge bg-light-primary text-decoration-none">{{\App\Models\Subscription::PAYMENT_TYPES[2] }}</a>
@elseif ($row->payment_type == 3)
    <a data-id="{{$row->payment_type}}"
       class="badge bg-light-primary text-decoration-none">{{\App\Models\Subscription::PAYMENT_TYPES[3] }}</a>
@elseif ($row->payment_type == 4)
    <a data-id="{{$row->payment_type}}"
       class="badge bg-light-primary text-decoration-none">{{\App\Models\Subscription::PAYMENT_TYPES[4] }}</a>
@else
    N/A
@endif
