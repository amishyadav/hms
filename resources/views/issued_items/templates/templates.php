<script id="issuedItemStatusTemplate" type="text/x-jsrender">
    <a title="{{:statusText}}" href="javascript:void(0)" class="badge action-btn bg-{{:statusBadge}} btn-sm changes-status-btn text-decoration-none" data-id="{{:id}}" data-status="{{:status}}">
         {{:statusText}}
    </a>

<!--    <a title="{{:statusText}}" href="javascript:void(0)" class="action-btn btn btn-{{:statusBadge}}">{{:statusText}}</a>-->




</script>

<script id="issuedItemActionTemplate" type="text/x-jsrender">
    <a title="<?php echo __('messages.common.delete') ?>" data-id={{:id}}" class="delete-btn btn px-2 text-danger fs-3 ps-0">
                        <i class="fa-solid fa-trash"></i>
    </a>



</script>
