<script id="insuranceActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn px-2 text-primary fs-3 ps-0 edit-btn" href="{{:url}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="delete-btn btn px-2 text-danger fs-3 ps-0" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>




</script>

<script id="insuranceStatusTemplate" type="text/x-jsrender">
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
         <input name="status" data-id="{{:id}}" class="form-check-input status" type="checkbox" value="1" {{:checked}} >
          <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>




</script>

<script id="insuranceDiseaseTemplate" type="text/x-jsrender">
<tr>
    <td class="text-center item-number">1</td>
     <td>
        <input class="form-control disease-name" required="" name="disease_name[]" type="text" data-id="{{:uniqueId}}">
    </td>
    <td>
        <input class="form-control disease-charge price-input" required="" name="disease_charge[]" type="text">
    </td>
    </td>
    <td class="text-center">
     <a href="#" title="<?php echo __('messages.common.delete') ?>"  class="insurances-delete-disease-btn insurances-delete-disease pointer btn px-2 text-danger fs-3 ps-0">
                    <i class="fa-solid fa-trash"></i>
                    </a>
    </td>
</tr>


</script>
