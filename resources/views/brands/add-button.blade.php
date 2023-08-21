@if(Auth::user()->hasRole('Pharmacist'))
    <div class="dropdown">
        <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
           data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
        </a>
        <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
            <li>
                <a href="{{ route('brands.create')}}"
                   class="dropdown-item  px-5">{{ __('messages.medicine.new_medicine_brand') }}</a>
            </li>
            <li>
                <a href="{{ route('brands.excel') }}"
                   class="dropdown-item  px-5" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
            </li>
        </ul>
    </div>
@else
    <a href="{{ route('brands.create') }}"
       class="btn btn-primary">{{ __('messages.medicine.new_medicine_brand') }}</a>
@endif
