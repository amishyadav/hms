<div class="badge bg-light-info">
    <div class="mb-2">{{ \Carbon\Carbon::parse($row->strats_at)->isoFormat('LT')}}</div>
    <div>{{ \Carbon\Carbon::parse($row->strats_at)->isoFormat('Do MMMM YYYY')}}</div>
</div>
