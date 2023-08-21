<a title="<?php echo __('messages.common.edit'); ?>" class="btn px-1 text-primary fs-3 ps-0"
   href="{{route('patient-cases.edit',$row->id)}}">
    <i class="fa fa-edit action-icon"></i>
</a>
<a title="<?php echo __('messages.common.delete'); ?>" class="btn px-1 text-danger fs-3 pe-0 delete-patient-case-btn"
   data-id="{{$row->id}}">
    <i class="fa fa-trash action-icon"></i>
</a>
