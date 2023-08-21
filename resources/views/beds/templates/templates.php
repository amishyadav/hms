<script id="bedActionTemplate" type="text/x-jsrender">
   <a title="<?php echo __('messages.common.edit'); ?>" class="btn action-btn btn-success btn-sm edit-btn" data-id="{{:id}}">
            <i class="fa fa-edit action-icon"></i>
   </a>
   <a title="<?php echo __('messages.common.delete'); ?>" class="btn action-btn btn-danger btn-sm delete-btn" data-id="{{:id}}">
            <i class="fa fa-trash action-icon"></i>
   </a>


</script>
<script id="bulkBedActionTemplate" type="text/x-jsrender">
    <tr>
        <td class="text-center item-number">1</td>
        <td>
            <input name="name[]" type="text" class="form-control bedName" required>
        </td>
        <td>
            <select class="form-select bedType form-select-solid fw-bold" name="bed_type[]" placeholder="Select Bed Type" id="bulk-bed-id_{{:uniqueId}}" data-id="{{:uniqueId}}" required>
                <option selected="selected" value >Select Bed Type</option>
                {{for bedTypes}}
                    <option value="{{:key}}">{{:value}}</option>
                {{/for}}
            </select>
        </td>
        <td>
            <input name="charge[]" type="text" class="form-control charge price-input" required>
        </td>
        <td>
            <textarea name="description[]" type="text" class="form-control description " rows="1"></textarea>
        </td>
        <td class="text-center">
             <a href="#" title="<?php echo __('messages.common.delete') ?>"  class="delete-btn btn px-2 text-danger fs-3 ps-0 delete-invoice-item">
                        <i class="fa fa-trash action-icon"></i>
             </a>
        </td>
    </tr>





</script>
