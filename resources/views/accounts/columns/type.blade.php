<div class="d-flex align-items-center mt-3">
    @if ($row->type == 1)
        <span class="badge bg-light-danger fs-7">{{ __('messages.accountant.debit') }}</span>
    @else
        <span class="badge bg-light-success fs-7">{{ __('messages.accountant.credit') }}</span>
    @endif    
</div>

