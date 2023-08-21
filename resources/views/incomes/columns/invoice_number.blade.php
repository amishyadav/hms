<div class="d-flex align-items-center">
    @if($row->invoice_number)
        <span class="badge bg-light-info text-decoration-none">{{$row->invoice_number}}</span>
    @else
        <span class="badge bg-light-info text-decoration-none">N/A</span>
    @endif

</div>
