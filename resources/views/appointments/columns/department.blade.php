@if(isset($row->department))
    <div class="d-flex align-items-center mt-4">
        <a href="{{ url('doctor-departments') . '/' . $row->department->id }}"
           class="text-decoration-none">{{$row->department->title}}</a>
    </div>
@else
    {{ __('messages.common.n/a') }}
@endif


