<a href="{{route('patient-admissions.edit', $row->id)}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-1 edit-btn text-primary fs-3">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}" data-message="{{ __('messages.patient_admissions') }}"
   data-url="{{url('patient-admissions')}}" class="btn delete-btn px-1 text-danger fs-3">
    <i class="fa-solid fa-trash"></i>
</a>
