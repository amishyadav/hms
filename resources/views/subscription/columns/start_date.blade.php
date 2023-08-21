<div class="badge bg-light-info">
    <div class="mb-2">{{ \Carbon\Carbon::parse($row->starts_at)->isoFormat('LT')}}</div>
    <div>{{ \Carbon\Carbon::parse($row->starts_at)->isoFormat('Do MMM, Y')}}</div>
</div>
