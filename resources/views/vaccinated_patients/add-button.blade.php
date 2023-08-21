<div class="card-toolbar ms-auto">
    <div class="d-flex align-items-center py-1">
        <div class="dropdown">
            <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
               data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
            </a>
            <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addVaccinatedPatientModal"
                       class="dropdown-item px-5">
                        {{ __('messages.vaccinated_patient.new_vaccinate_patient') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('vaccinated-patients.excel') }}"
                       class="dropdown-item  px-5" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
