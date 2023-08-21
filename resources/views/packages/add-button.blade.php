@if(Auth::user()->hasRole('Receptionist'))
    <div class="dropdown">
        <a href="#" class="btn btn-primary dropdown-toggle" id="packagesAddBtn"
           data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
        </a>
        <ul class="dropdown-menu action-dropdown" aria-labelledby="packagesAddBtn">
            <li>
                <a href="{{ route('packages.create') }}" class="dropdown-item  px-5">
                    {{ __('messages.package.new_package') }}
                </a>
            </li>
            <li>
                <a href="{{ route('packages.excel') }}" class="dropdown-item  px-5" data-turbo="false">
                    {{ __('messages.common.export_to_excel') }}
                </a>
            </li>
        </ul>
    </div>
@else
    <a href="{{ route('packages.create') }}" class="btn btn-primary">
        {{ __('messages.package.new_package') }}
    </a>
@endif
