<script id="scheduleActionTemplate" type="text/x-jsrender">

  <a href="{{:viewUrl}}" title="<?php echo __('messages.common.view') ?>" class="btn px-2 text-info fs-3 ps-0 py-2" data-bs-toggle="tooltip">
            <i class="fas fa-eye fs-5"></i>
        </a>
        <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 py-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn delete-btn px-2 text-danger pe-0 py-2">
            <i class="fa-solid fa-trash"></i>
        </a>


</script>
