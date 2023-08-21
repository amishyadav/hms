<script id="ipdPatientActionTemplate" type="text/x-jsrender">
<!-- {{if !bill_status}}-->
<!--   <a title="--><?php //echo __('messages.common.edit'); ?><!--" href="{{:url}}" class="btn action-btn btn-success btn-sm edit-ipd-patient-btn" data-id="{{:id}}">-->
<!--            <i class="fa fa-edit action-icon"></i>-->
<!--   </a>-->
<!--   {{/if}}-->
<!--   <a title="--><?php //echo __('messages.common.delete'); ?><!--" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">-->
<!--            <i class="fa fa-trash action-icon"></i>-->
<!--   </a>-->
    
    {{if !bill_status}}
     <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" data-id="{{:id}}" class="btn px-2 text-primary fs-3 py-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    {{/if}}
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn delete-btn px-2 text-danger pe-0 py-2">
            <i class="fa-solid fa-trash"></i>
        </a>
        



</script>
