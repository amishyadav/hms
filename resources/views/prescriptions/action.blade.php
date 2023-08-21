<div class="d-flex align-items-center">
    <a href="javascript:void(0)" title="<?php echo __('messages.common.view') ?>" data-id="{{$row->id}}" class="btn show-prescription-btn px-1 text-info fs-3">
                <i class="fas fa-eye"></i>
    </a>
{{--    <a href="{{ route('prescriptions.show', $row->id) }}" title="<?php echo __('messages.common.view') ?>" data-id="{{$row->id}}" class="btn px-1 text-info fs-3">--}}
{{--        <i class="fas fa-eye"></i>--}}
{{--    </a>--}}
    <a href="{{url('prescriptions'.'/'.$row->id.'/edit')}}" title="<?php echo __('messages.common.edit') ?>" class="btn px-1 text-primary fs-3">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}" class="btn delete-prescription-btn px-2 text-danger fs-3">
        <i class="fa-solid fa-trash"></i>
    </a>    
</div>

