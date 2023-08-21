<div class="mt-2 d-flex justify-content-center">
    @if($row->status)
        <span class="badge bg-light-success">{{__('messages.common.active')}}</span>
    @else
        <span class="badge bg-light-danger">{{ __('messages.common.de_active') }}</span>
    @endif
</div>

