<div class="d-flex align-items-center">
    <div class="image image-circle image-mini me-3">
        <img src="{{$row->doctor->user->image_url}}" alt="user" class="user-img">
    </div>
    <div class="d-flex flex-column">
        {{$row->doctor->user->full_name}}
        <span class="fs-6">{{$row->doctor->user->email}}</span>
    </div>
</div>
