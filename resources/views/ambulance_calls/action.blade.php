<a href="{{route('ambulance-calls.edit',$row->id)}}" title="<?php echo __('messages.common.edit') ?>"
   class="btn px-2 text-primary fs-3 ps-0">
    <span class="svg-icon svg-icon-3"></span>
    <i class="fa fa-edit action-icon"></i>
</a>
<a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
   class="ambulance-call-delete-btn btn px-2 text-danger fs-3 ps-0">
    <span class="svg-icon svg-icon-3"></span>
    <i class="fa fa-trash action-icon"></i>
</a>
