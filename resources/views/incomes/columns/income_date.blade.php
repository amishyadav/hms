<div class="d-flex align-items-center">
    <div class="badge bg-light-info">
        {{ \Carbon\Carbon::parse($row->date)->translatedFormat('jS M, Y')}}
    </div>    
</div>

