<div class="d-flex justify-content-end">
    @if(Auth::user()->hasRole('Case Manager'))
        <div class="dropdown">
            <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
               data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
            </a>
            <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
                <li>
                    <a href="{{ route('ambulance-calls.create') }}" class="dropdown-item  px-5">
                        {{ __('messages.insurance.new_insurance') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('ambulance.calls.excel') }}" class="dropdown-item  px-5" data-turbo="false">
                        {{ __('messages.common.export_to_excel') }}
                    </a>
                </li>
            </ul>
        </div>
    @else
        <a href="{{ route('ambulance-calls.create') }}" class="btn btn-primary">
            {{ __('messages.ambulance_call.new_ambulance_call') }}
        </a>
    @endif
</div>
