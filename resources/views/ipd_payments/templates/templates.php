<script id="ipdPaymentActionTemplate" type="text/x-jsrender">

   {{if !isPaymentModeStripe }}
<a href="javascript:void(0)" title="<?php echo __('messages.common.edit') ?>" data-id="{{:id}}" class="btn px-2 text-primary fs-3 py-2 ipdpayment-edit-btn">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        {{/if}}
        <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{:id}}" class="btn ipdpayment-delete-btn px-2 text-danger pe-0 py-2">
            <i class="fa-solid fa-trash"></i>
            </a>


</script>
