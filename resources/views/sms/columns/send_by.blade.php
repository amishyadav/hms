@if($row->sendBy)
    {{ $row->sendBy->first_name.' '.$row->sendBy->last_name }}
@else
    N/A
@endif
