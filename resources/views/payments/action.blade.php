<a href="javascript:void(0)" title="<?php echo __('messages.common.view') ?>"
   class="btn px-1 text-info fs-3 payment-show-btn" data-id="{{$row->id}}">
    <i class="fas fa-eye"></i>
</a>
<a href="{{ route('payments.edit',$row->id) }}" title="<?php echo __('messages.common.edit') ?>"
   class="btn px-1 text-primary fs-3">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a title="{{__('messages.common.delete')}}" href="javascript:void(0)" data-id="{{ $row->id }}" wire:key="{{$row->id}}"
   class="btn px-1 text-danger fs-3 payment-delete-btn">
    <i class="fa-solid fa-trash"></i>
</a>
