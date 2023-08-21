<label class="form-check form-switch fs-5 text-gray-800 form-switch-sm">
    <input name="status" data-id="{{$row->id}}" class="form-check-input category-status" type="checkbox" value="1"
           value="1" {{$row->is_active == 0 ? '' : 'checked'}} >
    <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
</label>
