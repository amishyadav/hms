@if($row->phone)
    {{ $row->phone }}
@else
    {{ __('messages.common.n/a') }}
@endif
