<a href="{{route('patient-cases.edit', $row->id)}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-1 edit-btn text-primary fs-3">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}" data-message="{{ __('messages.case.case') }}"
   data-url="{{url('patient-cases')}}" class="btn delete-btn px-1 text-danger fs-3">
    <i class="fa-solid fa-trash"></i>
</a>
