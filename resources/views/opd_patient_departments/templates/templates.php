<script id="opdPatientActionTemplate" type="text/x-jsrender">

    <a href="javascript:void(0)" title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn text-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>


</script>

<script id="opdVisitsActionTemplate" type="text/x-jsrender">

<a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>"  class="btn px-2 text-primary fs-3 py-2  edit-opd-patient-btn">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn delete-visit-btn px-2 text-danger pe-0 py-2">
            <i class="fa-solid fa-trash"></i>
            </a>



</script>
