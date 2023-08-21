@if(Auth::user()->hasRole('Receptionist|Case Manager'))
    <div class="dropdown custom-dropdown d-flex align-items-center py-4">
        <button class="btn btn-primary text-white dropdown-toggle hide-arrow" type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('messages.common.actions') }}
        </button>
        <div class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton1">
            <ul>
                <li>
                    <a href="{{ route('patient-cases.create') }}"
                       class="dropdown-item">{{ __('messages.case.new_case') }}</a>
                </li>
                <li>
                    <a href="{{ route('patient.cases.excel') }}"
                       class="dropdown-item" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
                </li>
            </ul>
        </div>
    </div>
@else
    <div class="py-4">
        <a href="{{ route('patient-cases.create') }}" class="btn btn-primary">
            {{ __('messages.case.new_case') }}
        </a>
    </div>
@endif
