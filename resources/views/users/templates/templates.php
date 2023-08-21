<script id="userStatusTemplate" type="text/x-jsrender">
<div class="d-flex justify-content-center">
    <label class="form-check form-switch justify-content-center">
         <input name="status" data-id="{{:id}}" class="form-check-input status" type="checkbox" value="1" {{:checked}} >
          <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>
</div>




</script>

<script id="userActionTemplate" type="text/x-jsrender">

  <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0 py-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        {{if role != 'Admin'}}
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn delete-btn px-2 text-danger fs-3 py-2">
            <i class="fa-solid fa-trash"></i>
        </a>
            {{/if}}


</script>
