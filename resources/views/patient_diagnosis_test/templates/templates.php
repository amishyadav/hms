<script id="patientDiagnosisTestActionTemplate" type="text/x-jsrender">
    <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0">
                       <i class="fa-solid fa-pen-to-square"></i>
    </a>
 <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id={{:id}}" class="delete-btn btn px-2 text-danger fs-3 ps-0">
                        <i class="fa-solid fa-trash"></i>
    </a>





</script>

<script id="patientDiagnosisTestTemplate" type="text/x-jsrender">
<tr>
    <td class="text-center item-number">1</td>
     <td>
        <input class="form-control diagnosis-name" name="property_name[]" type="text" data-id="{{:uniqueId}}">
    </td>
    <td>
        <input class="form-control diagnosis-value" name="property_value[]" type="text">
    </td>
    </td>
    <td class="text-center">
    <a title="{{__('messages.common.delete')}}" href="javascript:void(0)"
       class="delete-diagnosis pointer btn-icon btn px-1 text-danger fs-3 pe-0">
        <i class="fa-solid fa-trash"></i>
    </a>
    </td>
</tr>
</script>
