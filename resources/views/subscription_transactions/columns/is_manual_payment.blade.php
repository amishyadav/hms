@if(getLoggedInUser()->hasRole('Super Admin'))
    @if ($row->is_manual_payment == 0 && $row->status == 0) 
        <div class="d-flex align-items-center">
            <select class="form-select form-select-sm form-select-solid approve-status payment-approve" data-id="{{ $row->id }}">
                <option selected="selected" value="">{{ __('messages.subscription.waiting_for_approval') }}</option>
                <option value="1">{{ __('messages.subscription.approved') }}</option>
                <option value="2" >{{ __('messages.subscription.denied') }}</option>
            </select>
        </div>
    @elseif ($row->is_manual_payment == 1) 
        <span class="badge bg-light-success">{{ __('messages.subscription.approved') }}</span>
    @elseif ($row->is_manual_payment == 2) 
        <span class="badge bg-light-danger">{{ __('messages.subscription.denied') }}</span>
    @else 
        N/A
    @endif
@else
    @if ($row->is_manual_payment == 0 && $row->status == 0) 
        <span class="badge bg-light-primary">{{ __('messages.subscription.waiting_for_approval') }}</span>
    @elseif ($row->is_manual_payment == 1) 
        <span class="badge bg-light-success">{{ __('messages.subscription.approved') }}</span>
    @elseif ($row->is_manual_payment == 2) 
        <span class="badge bg-light-danger">{{ __('messages.subscription.denied') }}</span>
    @else 
        N/A
    @endif
@endif
