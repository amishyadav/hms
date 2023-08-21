<p class="text-end">
    <b>{{ getCurrencySymbol() }}</b> {{ number_format($row->amount - ($row->amount * $row->discount / 100), 2) }}
</p>

