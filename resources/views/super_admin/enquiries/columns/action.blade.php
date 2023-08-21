<div class="d-flex align-items-center">
    <a href="{{ route('super.admin.enquiry.show', $row->id) }}" title="{{__('messages.common.view') }}"
       class="btn px-1 text-primary fs-3">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a href="javascript:void(0)" title="{{__('messages.common.delete')}}" data-id="{{ $row->id }}"
       class="super-admin-enquiry-delete-btn btn px-1 text-danger fs-3" wire:key="{{$row->id}}">
        <i class="fa-solid fa-trash"></i>
    </a>
</div>
