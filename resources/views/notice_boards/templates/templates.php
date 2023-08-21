<script class="noticeActionTemplate" type="text/x-jsrender">

 <a href="{{:show}}" title="<?php echo __('messages.common.view') ?>" class="btn px-2 text-info fs-3 ps-0" data-id="{{:id}}">
       <i class="fa fa-eye"></i>
    </a>

   <a href="javascript:void(0)" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0 edit-btn" data-id="{{:id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
  

    <a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id={{:id}} class="delete-btn btn px-2 text-danger fs-3 ps-0">
    <i class="fa-solid fa-trash"></i>
</a>


</script>
