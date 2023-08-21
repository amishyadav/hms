@if(getLoggedinPatient())
    @if ($row->status == 1)
        <span class="badge bg-light-success fs-7">{{ __('messages.common.active')}}</span>
    @else
        <span class="badge bg-light-danger fs-7">{{ __('messages.common.de_active')}}</span>
    @endif

@else
    <label class="form-check form-switch">
        <input name="status" data-id="{{$row->id}}" class="form-check-input patientAdmissionStatus" type="checkbox"
               value="1" {{ $row->status == 0 ? '' : 'checked' }} />
        <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>
@endif
