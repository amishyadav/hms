<a href="{{route('ambulances.edit',$row->id)}}" title="<?php echo __('messages.common.edit') ?>"
   class="btn px-2 text-primary fs-3 ps-0">
    <i class="fa fa-edit action-icon"></i>
</a>
<a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
   class="ambulances-delete-btn btn px-2 text-danger fs-3 ps-0">
    <i class="fa fa-trash action-icon"></i>
</a>
