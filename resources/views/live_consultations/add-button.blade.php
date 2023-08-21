@if(getLoggedInUser()->hasRole('Doctor'))
    <div class="dropdown">
        <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
           data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
        </a>
        <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#add_consulatation_modal"
                   class="dropdown-item  px-5"> {{ __('messages.live_consultation.new_live_consultation') }}
                </a>
            </li>
            <li>
                <a href="#" class="dropdown-item px-5 add-credential">
                    {{ __('messages.live_consultation.add_credential') }}
                </a>
            </li>
        </ul>
    </div>
@elseif(!Auth::user()->hasRole('Patient'))
    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
       data-bs-target="#add_consulatation_modal">{{__('messages.live_consultation.new_live_consultation')}}</a>
@endif
