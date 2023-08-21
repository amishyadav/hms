@if ($row->email_verified_at == null)
    <div class="d-flex justify-content-center">
        <a href="javascript:void(0)" data-id="{{$row->id}}" style="pointer-events: none;
                            cursor: default;"
           class="btn btn-sm btn-secondary user-hospital-impersonate">{{ __('messages.impersonate') }}</a>
    </div>
@else
    <div class="d-flex justify-content-center">
        <a href="javascript:void(0)" data-id="{{$row->id}}"
           class="btn btn-sm btn-primary user-hospital-impersonate">{{ __('messages.impersonate') }}</a>
    </div>
@endif
