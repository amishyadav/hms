<script id="labTechnicianActionTemplate" type="text/x-jsrender">
  <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0 edit-btn">
       <i class="fa-solid fa-pen-to-square"></i>                         
    </a>
    <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id={{:id}}" class="delete-btn btn px-2 text-danger fs-3 ps-0">
     <i class="fa-solid fa-trash"></i>
    </a>


</script>

<script id="labTechnicianStatusTemplate" type="text/x-jsrender">
   <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
         <input name="status" data-id="{{:id}}" class="form-check-input status" type="checkbox" value="1" {{:checked}} >
          <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>

</script>
