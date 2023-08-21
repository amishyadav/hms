<div class="mt-2 d-flex justify-content-center">
    @if ($row->accounts->type == 1)
        <span class="badge bg-light-danger">Debit</span>
    @else
        <span class="badge bg-light-success">Credit</span>
    @endif    
</div>

