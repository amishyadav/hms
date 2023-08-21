<a href="{{route('bills.edit', $row->id)}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 edit-btn text-primary fs-3">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}" data-message="Bill"
   data-url="{{url('bills')}}" class="btn delete-btn px-2 text-danger fs-3">
    <i class="fa-solid fa-trash"></i>
</a>
