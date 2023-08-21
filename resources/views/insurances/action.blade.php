<a title="<?php echo __('messages.common.edit'); ?>" class="btn px-2 text-primary fs-3 ps-0"
   href="{{route('insurances.edit',$row->id)}}">
    <i class="fa fa-edit action-icon"></i>
</a>
<a title="<?php echo __('messages.common.delete'); ?>" class="insurances-delete-btn btn px-2 text-danger fs-3 ps-0"
   data-id="{{$row->id}}">
    <i class="fa fa-trash action-icon"></i>
</a>
