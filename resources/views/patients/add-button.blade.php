<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
        {{ __('messages.common.actions') }}
    </button>
    <div class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton1">
        <ul>
            <li>
                <a href="{{ route('patients.create') }}"
                   class="dropdown-item">{{ __('messages.patient.new_patient') }}</a>
            </li>
            <li>
                <a href="{{ route('patient.excel') }}"
                   class="dropdown-item" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
            </li>
        </ul>
    </div>
</div>
