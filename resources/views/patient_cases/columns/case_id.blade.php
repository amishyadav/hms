<div class="d-flex align-items-center mt-3">
    @if(getLoggedinPatient())
        <a data-id="{{$row->id}}" href="{{url('patient'.'/'.'my-cases'.'/'.$row->id)}}"
           class="badge bg-light-primary text-decoration-none">{{$row->case_id}}</a>
    @else
        <a data-id="{{$row->id}}"
           class="show-patient-case-btn badge bg-light-info cursor-pointer text-decoration-none">{{$row->case_id}}</a>
    @endif
</div>


