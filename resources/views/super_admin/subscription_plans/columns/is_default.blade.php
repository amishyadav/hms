<div class="d-flex text-center">
    @if($row->is_default == 1)
        <span class="badge bg-light-success">{{ __('messages.common.default_plan') }}</span>
    @else
        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm justify-content-center">
            <input name="is_default" data-id="{{$row->id}}" class="form-check-input subscription_plan_is_default cursor-pointer" type="checkbox"
                   value="1">
            <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
        </label>
    @endif
</div>
