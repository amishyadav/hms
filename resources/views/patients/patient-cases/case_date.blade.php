<div class="badge bg-light-info">
    <div class="mb-2">{{ \Carbon\Carbon::parse($row->date)->translatedFormat('g:i A') }}</div>
    <div>{{ \Carbon\Carbon::parse($row->date)->translatedFormat('jS M, Y') }}</div>
</div>
