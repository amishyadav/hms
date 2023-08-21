@if(!empty($row->patient))
    <div class="d-flex align-items-center">
        <div class="image image-mini me-3">
            <a href="{{route('patients.show',$row->patient->id)}}">
                <div>
                    <img src="{{$row->patient->patientUser->image_url}}" alt=""
                         class="user-img image image-circle object-contain">
                </div>
            </a>
        </div>
        <div class="d-flex flex-column">
            <a href="{{route('patients.show',$row->patient->id)}}"
               class="mb-1 text-decoration-none">{{$row->patient->patientUser->full_name}}</a>
            <span>{{$row->patient->patientUser->email}}</span>
        </div>
    </div>
 @else
    <div class="d-flex align-items-center">
        <div class="image image-mini me-3">
            <a href="javascript:void(0)">
                <div>
                    <img src="{{ !empty($row->patient) ? $row->patient->patientUser->image_url  : asset('web/img/logo.jpg')  }}"
                         class="user-img image image-circle object-contain">
                </div>
            </a>
        </div>
        <div class="d-flex flex-column">
            <a href="javascript:void(0)"
               class="mb-1 text-decoration-none">N/a</a>
            <span>N/a<a href=""></a></span>
        </div>
    </div>
@endif
