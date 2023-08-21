<div class="d-flex align-items-center">
    <a href="javascript:void(0)" title="{{__('messages.common.edit') }}" data-id="{{ $row->id }}"
       class="service-slider-edit-btn btn px-1 text-primary fs-3">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" title="{{__('messages.common.delete')}}" data-id="{{ $row->id }}"
       class="service-slider-delete-btn btn px-1 text-danger fs-3" wire:key="{{$row->id}}">
        <i class="fa-solid fa-trash"></i>
    </a>
</div>
