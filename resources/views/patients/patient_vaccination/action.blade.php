<a href="javascript:void(0)" title="{{ __('messages.common.edit') }}" class="btn px-1 text-primary fs-3 edit-vaccination-btn" data-id="{{ $row->id }}">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{ $row->id }}"
   data-message="Document" data-url="{{ route('vaccinated-patients.index') }}" class="btn delete-btn px-1 fs-3 text-danger">
    <i class="fa-solid fa-trash"></i>
</a>
