
@if (Auth::user()->hasRole('Admin'))
    <a href="{{route('notice-boards.show', $row->id)}}" title="<?php echo __('messages.common.view') ?>"
       class="btn px-2 text-info fs-3 ps-0" data-id="{{$row->id}}">
        <i class="fa fa-eye"></i>
    </a>
    <a href="javascript:void(0)" title="<?php echo __('messages.common.edit') ?>"
       class="btn px-2 text-primary fs-3 ps-0 notice-edit-btn" data-id="{{$row->id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
       class="delete-btn btn px-2 text-danger fs-3 ps-0 notice-board-delete-btn">
        <i class="fa-solid fa-trash"></i>
    </a>
@else
    <a href="{{route('noticeboard.show', $row->id)}}" title="<?php echo __('messages.common.view') ?>"
       class="btn px-2 text-info fs-3 ps-0 " data-id="{{$row->id}}">
        <i class="fa fa-eye"></i>
    </a>
@endif
