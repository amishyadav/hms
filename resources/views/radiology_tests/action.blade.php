<a title="<?php echo __('messages.common.edit'); ?>" class="btn text-primary fs-3 px-2" href="{{route('radiology.test.edit',$row->id)}}">
    <i class="fa fa-edit action-icon"></i>
</a>
<a title="<?php echo __('messages.common.delete'); ?>" class="btn text-danger fs-3 px-2 delete-radiology-test-btn" data-id="{{$row->id}}">
    <i class="fa fa-trash action-icon"></i>
</a>
