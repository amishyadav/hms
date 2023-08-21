<div class="d-flex align-items-center">
    <div class="image image-circle image-mini me-3">
        <img src="{{$row->patient->user->image_url}}" alt="user" class="user-img">
    </div>
    <div class="d-flex flex-column">
        {{$row->patient->user->full_name}}
        <span class="fs-6">{{$row->patient->user->email}}</span>
    </div>
</div>
