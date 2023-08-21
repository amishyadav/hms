<a title="<?php echo __('messages.common.edit'); ?>" class="btn px-2 action-btn text-primary fs-3" href="{{route('packages.edit',$row->id)}}">
    <i class="fa fa-edit"></i>
</a>
<a title="<?php echo __('messages.common.delete'); ?>" class="btn px-2 action-btn text-danger fs-3 packages-delete-btn" data-id="{{$row->id}}">
    <i class="fa fa-trash action-icon"></i>
</a>
