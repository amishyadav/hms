<script id="DocumentActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit') ?>" data-id={{:id}}" class="btn px-2 text-primary fs-3 ps-0 edit-btn">
     <i class="fa-solid fa-pen-to-square"></i>
</a>
 <a title="<?php echo __('messages.common.save'); ?>" class="btn px-2 text-info fs-3 ps-0" href="{{:downloadLink}}">
             <i class="fa fa-download action-icon"></i>
        </a>
<a title="<?php echo __('messages.common.delete') ?>" data-id={{:id}}" class="delete-btn btn px-2 text-danger fs-3 ps-0">
   <i class="fa-solid fa-trash"></i>
</a>
</script>
