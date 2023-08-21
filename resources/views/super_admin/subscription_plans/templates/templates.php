<script id="subscriptionPlanTemplate" type="text/x-jsrender">
    
 
        <a href="{{:showUrl}}" title="<?php echo __('messages.common.show') ?>" class="btn px-2 text-info fs-3 ps-0 py-2" data-bs-toggle="tooltip">
            <i class="fas fa-eye fs-5"></i>
        </a>
        <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 py-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        {{if isDefault}}
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn delete-btn px-2 text-danger pe-0 py-2">
            <i class="fa-solid fa-trash"></i>
        </a>
         {{/if}}
 
  


</script>

<script id="makeDefaultSubscriptionPlanTemplate" type="text/x-jsrender">

<div class="d-flex justify-content-center">
    {{if checked == ''}}
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm justify-content-center">
         <input name="is_default" data-id="{{:id}}" class="form-check-input is_default" type="checkbox" value="1" {{:checked}} >
          <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>
    {{else}}
        <span class="badge bg-light-success">Default Plan</span>
    {{/if}}
    </div>


</script>
