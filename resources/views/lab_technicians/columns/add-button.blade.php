<div class="dropdown">
    <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
       data-bs-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
    </a>
    <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
        <li>
            <a href="{{ route('lab-technicians.create') }}" class="dropdown-item  px-5">
                {{ __('messages.lab_tech.new_lab_tech') }}
            </a>
        </li>
        <li>
            <a href="{{ route('lab.technicians.excel') }}"
               class="dropdown-item  px-5" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
        </li>
    </ul>
</div>
