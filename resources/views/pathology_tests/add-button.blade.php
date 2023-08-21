@if(Auth::user()->hasRole('Lab Technician'))
    <div class="dropdown">
        <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"
           data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
        </a>
        <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">
            <li>
                <a href="{{ route('pathology.test.create')}}"
                   class="dropdown-item  px-5">{{ __('messages.pathology_test.new_pathology_test') }}</a>
            </li>
            <li>
                <a href="{{ route('pathology.tests.excel') }}"
                   class="dropdown-item  px-5" data-turbo="false">{{ __('messages.common.export_to_excel') }}</a>
            </li>
        </ul>
    </div>
@else
    <a href="{{ route('pathology.test.create') }}" class="btn btn-primary">
        {{ __('messages.pathology_test.new_pathology_test') }}
    </a>
@endif
