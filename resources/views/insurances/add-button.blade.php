@if(Auth::user()->hasRole('Receptionist'))
    <div class="dropdown">
        <a href="#" class="btn btn-primary dropdown-toggle" id="insurancesAddBtn"
           data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
        </a>
        <ul class="dropdown-menu action-dropdown" aria-labelledby="insurancesAddBtn">
            <li>
                <a href="{{ route('insurances.create') }}" class="dropdown-item  px-5">
                    {{ __('messages.insurance.new_insurance') }}
                </a>
            </li>
            <li>
                <a href="{{ route('insurances.excel') }}" class="dropdown-item  px-5" data-turbo="false">
                    {{ __('messages.common.export_to_excel') }}
                </a>
            </li>
        </ul>
    </div>
@else
    <a href="{{ route('insurances.create') }}"
       class="btn btn-primary">{{ __('messages.insurance.new_insurance') }}</a>
@endif
