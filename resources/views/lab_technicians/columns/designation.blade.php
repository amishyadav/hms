<div class="d-flex align-items-center">
    @if($row->user->designation)
        {{$row->user->designation}}
    @else
        {{__('messages.common.n/a')}}
    @endif
</div>

