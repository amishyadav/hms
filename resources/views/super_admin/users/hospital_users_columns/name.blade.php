<div class="d-flex align-items-center">
    <div class="image image-circle image-mini me-3">
        <a href="#" data-id="{{$row->id}}" class="show-btn">
            <div>
                <img src="{{ $row->image_url }}" alt=""
                     class="user-img rounded-circle image">
            </div>
        </a>
    </div>
    <div class="d-flex flex-column">
        <span class="mb-1 show-btn" data-id="${row.id}">{{ $row->full_name }}</span>
    </div>
</div>
