<div class="d-flex justify-content-center">
    <a href="{{route('patient-admissions.edit',$row->id)}}" title="<?php echo __('messages.common.edit') ?>"
       class="btn px-2 text-primary fs-3 ps-0">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="#" title="<?php echo __('messages.common.delete') ?>" data-id="{{$row->id}}"
       class="delete-patient-admission-btn btn px-2 text-danger fs-3 ps-0">
        <i class="fa-solid fa-trash"></i>
    </a>    
</div>

