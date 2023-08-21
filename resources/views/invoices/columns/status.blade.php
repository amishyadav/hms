<div class="d-flex align-items-center justify-content-center mt-2">
    @if ($row->status_label === 'Paid')
        <span class="badge bg-light-primary fs-7">{{ $row->status_label }}</span>
    @else
        <span class="badge bg-light-warning fs-7">{{ $row->status_label  }}</span>
    @endif    
</div>

