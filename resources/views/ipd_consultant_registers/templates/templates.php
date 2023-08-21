<script id="ipdConsultantRegisterActionTemplate" type="text/x-jsrender">

  <a href="javascript:void(0)" title="<?php echo __('messages.common.edit') ?>" data-id="{{:id}}" class="btn px-2 text-primary fs-3 py-2  edit-consultant-btn">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn delete-consultant-btn px-2 text-danger pe-0 py-2">
            <i class="fa-solid fa-trash"></i>
            </a>



</script>

<script id="ipdConsultantInstructionItemTemplate" type="text/x-jsrender">
    <tr>
        <td class="text-center item-number consultant-table-td">1</td>
        <td class="consultant-table-td position-relative">
            <input class="form-control  appliedDate" name="applied_date[]" type="text" autocomplete="off" required>
        </td>
        <td class="consultant-table-td">
            <select class="form-select doctorId select2Selector" name="doctor_id[]" placeholder="Select Doctor" data-id="{{:uniqueId}}" required>
                <option selected="selected" value=0">Select Doctor</option>
                {{for doctors}}
                    <option value="{{:key}}">{{:value}}</option>
                {{/for}}
            </select>
        </td>
        <td class="consultant-table-td position-relative">
            <input class="form-control  instructionDate" name="instruction_date[]" type="text" autocomplete="off" required>
        </td>
        <td class="consultant-table-td">
            <textarea class="form-control " name="instruction[]" onkeypress='return avoidSpace(event);' rows="1" required></textarea>
        </td>
        <td class="text-center consultant-table-td">
            <i class="fa fa-trash text-danger deleteIpdConsultantInstruction pointer"></i>
        </td>
    </tr>





</script>
