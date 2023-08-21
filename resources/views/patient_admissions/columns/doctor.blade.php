<div class="d-flex align-items-center">
    @if (Auth::user()->hasRole('Patient'))
        <a href="javascript:void(0)">
            <div class="image image-circle image-mini me-3">
                <img src="{{$row->doctor->doctorUser->image_url}}" alt="user"
                     class="user-img image rounded-circle object-contain">
            </div>
        </a>
    @else
        <a href="{{route('doctor.show',$row->doctor->id)}}">
            <div class="image image-circle image-mini me-3">
                <img src="{{$row->doctor->doctorUser->image_url}}" alt="user"
                     class="user-img image rounded-circle object-contain">
            </div>
        </a>
    @endif
    @if (Auth::user()->hasRole('Patient'))
        <div class="d-flex flex-column">
            <a href="javascript:void(0)" class="mb-1 text-decoration-none fs-6">
                {{$row->doctor->doctorUser->full_name}}
            </a>
            <span class="fs-6">{{$row->doctor->doctorUser->email}}</span>
        </div>
    @else
        <div class="d-flex flex-column">
            <a href="{{route('doctor.show',$row->doctor->id)}}" class="mb-1 text-decoration-none fs-6">
                {{$row->doctor->doctorUser->full_name}}
            </a>
            <span class="fs-6">{{$row->doctor->doctorUser->email}}</span>
        </div>
    @endif

</div>
