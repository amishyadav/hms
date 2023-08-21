@if($row->user->phone !== null)
    {{$row->user->phone}}
@else
    {{ __('messages.common.n/a')}}
@endif
