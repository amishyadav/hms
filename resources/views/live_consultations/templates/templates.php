<script id="liveConsultationActionTemplate" type="text/x-jsrender">
    {{if status == 0}}
        <a title="{{:title}}" class="btn px-2 text-info fs-3 ps-0 start-btn" data-id="{{:id}}">
            <i class="fas fa-record-vinyl"></i>
        </a>
    {{/if}}

     {{if isDoctor || isAdmin}}
        {{if !isMeetingFinished}}
            <a href="#" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0 edit-btn" data-id="{{:id}}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        {{/if}}
            <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id={{:id}}" class="delete-btn btn px-2 text-danger fs-3 ps-0">
     <i class="fa-solid fa-trash"></i>
            </a>
     {{/if}}

</script>
<script id="liveMeetingActionTemplate" type="text/x-jsrender">
    {{if status == 0}}
    <a title="{{:title}}" class="btn px-2 text-info fs-3 ps-0 start-btn" data-id="{{:id}}">
            <i class="fas fa-record-vinyl"></i>
        </a>
    {{/if}}
    {{if isDoctor || isAdmin}}
        {{if !isMeetingFinished}}
        <a href="#" title="<?php echo __('messages.common.edit') ?>" class="btn px-2 text-primary fs-3 ps-0 edit-btn" data-id="{{:id}}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        {{/if}}
         <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id={{:id}}" class="delete-btn btn px-2 text-danger fs-3 ps-0">
     <i class="fa-solid fa-trash"></i>
            </a>
     {{/if}}


</script>
