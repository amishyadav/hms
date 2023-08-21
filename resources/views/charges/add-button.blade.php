@if(Auth::user()->hasRole('Receptionist'))
    <div class="dropdown">
        <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
           data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
        </a>
        <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#add_charges_modal"
                   class="dropdown-item  px-5"> {{ __('messages.charge.new_charge') }}
                </a>
            </li>
            <li>
                <a href="{{ route('charges.excel') }}"
                   class="dropdown-item  px-5" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
            </li>
        </ul>
    </div>
@else
    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
       data-bs-target="#add_charges_modal">{{ __('messages.charge.new_charge') }}</a>
@endif
