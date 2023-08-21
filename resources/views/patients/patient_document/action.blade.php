@if (!empty($row->document_url))
    <a class="btn px-1 text-primary fs-3 py-2" href="{{url('document-download',$row->id)}}">
        <i class="fa fa-download" aria-hidden="true"></i>
    </a>
@endif
<a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{ $row->id }}"
   data-message="Document" data-url="{{ route('documents.index') }}" class="btn delete-btn px-1 fs-3 text-danger">
    <i class="fa-solid fa-trash"></i>
</a>
