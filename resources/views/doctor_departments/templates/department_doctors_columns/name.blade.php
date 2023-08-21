<div class="d-flex align-items-center">
    <div class="image image-mini me-3">
        @if(Auth::user()->hasRole('Patient'))
            <a href="javascript:void(0)">
                <div class="">
                    <img src="{{$row->doctorUser->image_url}}" alt="" class="user-img rounded-circle image">
                </div>
            </a>
        @else
            <a href="{{ url('employee/doctor').'/'.$row->id  }}">
                <div class="">
                    <img src="{{$row->doctorUser->image_url}}" alt="" class="user-img rounded-circle image">
                </div>
            </a>
        @endif
    </div>
    <div class="d-flex flex-column">
        @if(Auth::user()->hasRole('Patient'))
            <a href="javascript:void(0)" class="mb-1 text-decoration-none">{{$row->doctorUser->full_name}}</a>
            <span>{{$row->doctorUser->email}}</span>
        @else
            <a href="{{ url('employee/doctor').'/'.$row->id  }}"
               class="mb-1 text-decoration-none">{{$row->doctorUser->full_name}}</a>
            <span>{{$row->doctorUser->email}}</span>
        @endif
    </div>
</div>
