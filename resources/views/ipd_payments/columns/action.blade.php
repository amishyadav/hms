@if($row->payment_mode != 3)
<a href="javascript:void(0)" title="<?php echo __('messages.common.edit') ?>" data-id="{{$row->id}}"
   class="btn px-2 text-primary fs-3 py-2  ipdpayment-edit-btn">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
@endif
<a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
   class="btn ipdpayment-delete-btn px-2 text-danger fs-3">
    <i class="fa-solid fa-trash"></i>
</a>
