<span
        class="badge bg-light-{{($row->user->status == 1) ? 'success' : 'danger'}}">{{ ($row->user->status) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
