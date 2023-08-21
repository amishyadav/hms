<script id="userStatusTemplate" type="text/x-jsrender">
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm justify-content-center">
         <input name="status" data-id="{{:id}}" class="form-check-input status" type="checkbox" value="1" {{:checked}} >
          <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>

</script>

<script id="hospitalTemplate" type="text/x-jsrender">
 
        <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0 py-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn delete-btn px-2 text-danger fs-3 py-2">
            <i class="fa-solid fa-trash"></i>
        </a>
 

</script>
