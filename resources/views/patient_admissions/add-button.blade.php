<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
        {{ __('messages.common.actions') }}
    </button>
    <div class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton1">
        <ul>
            <li>
                <a href="{{ route('patient-admissions.create') }}"
                   class="dropdown-item"> {{ __('messages.patient_admission.new_patient_admission') }}</a>
            </li>
            @if(Auth::user()->hasRole('Admin|Doctor|Case Manager|Receptionist'))
                <li>
                    <a href="{{ route('patient.admissions.excel') }}"
                       class="dropdown-item" data-turbo="false"> {{ __('messages.common.export_to_excel') }}</a>
                </li>
            @endif
        </ul>
    </div>
</div>
