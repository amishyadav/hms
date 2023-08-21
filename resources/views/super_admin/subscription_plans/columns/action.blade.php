<a href="{{ route('super.admin.subscription.plans.show',$row->id) }}" title="{{__('messages.common.show')}}"
   class="btn px-1 text-info fs-3" data-bs-toggle="tooltip">
    <i class="fas fa-eye"></i>
</a>
<a href="{{ route('super.admin.subscription.plans.edit',$row->id) }}" title="<?php echo __('messages.common.edit') ?>"
   class="btn px-1 text-primary fs-3">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
@if($row->is_default != 1)
    <a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
       class="btn subscription-plan-delete-btn px-1 text-danger fs-3">
        <i class="fa-solid fa-trash"></i>
    </a>
@endif
 
