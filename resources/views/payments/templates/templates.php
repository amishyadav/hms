<script id="paymentActionTemplate" type="text/x-jsrender">

<a href="#" title="<?php echo __('messages.common.view') ?>" class="show-btn btn btn px-2 text-info fs-3 ps-0" data-id={{:id}}">
    <i class="fas fa-eye fs-5"></i>
</a>
<a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0">
  <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="#" title="<?php echo __('messages.common.delete') ?>" data-id={{:id}}" class="delete-btn btn px-2 text-danger fs-3 ps-0">
      <i class="fa-solid fa-trash"></i>
</a>




</script>
