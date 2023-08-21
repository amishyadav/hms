<a href="{{route('hospital.edit',$row->id)}}" title="<?php echo __('messages.common.edit') ?>"
   class="btn px-2 text-primary fs-3 ps-0 py-2">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
   class="btn super-user-delete-btn px-2 text-danger fs-3 py-2">
    <i class="fa-solid fa-trash"></i>
</a>
