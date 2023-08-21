<div class="card-toolbar ms-auto">
    <div class="dropdown">
        <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
           data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
        </a>
        <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
            <li>
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add_postal_receives_modal"
                   class="dropdown-item  px-5">{{ __('messages.postal.new_receive') }}</a>
            </li>
            <li>
                <a href="{{ route('receives.excel') }}"
                   class="dropdown-item  px-5" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
            </li>
        </ul>
    </div>
</div>
