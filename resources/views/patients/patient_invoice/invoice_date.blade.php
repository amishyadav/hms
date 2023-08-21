@if(Auth::user()->hasRole('Admin'))
    <a href="{{ url('employee/invoices',$row->id) }}">
        <div class="badge bg-light-info">
            <div class="mb-2">{{ \Carbon\Carbon::parse($row->invoice_date)->translatedFormat('g:i A') }}</div>
            <div>{{ \Carbon\Carbon::parse($row->invoice_date)->translatedFormat('jS M, Y') }}</div>
        </div>
    </a>
@elseif(Auth::user()->hasRole('Accountant'))
    <a href="{{ url('invoices',$row->id) }}">
        <div class="badge bg-light-info">
            <div class="mb-2">{{ \Carbon\Carbon::parse($row->invoice_date)->translatedFormat('g:i A') }}</div>
            <div>{{ \Carbon\Carbon::parse($row->invoice_date)->translatedFormat('jS M, Y') }}</div>
        </div>
    </a>
@else
    <div class="badge bg-light-info">
        <div class="mb-2">{{ \Carbon\Carbon::parse($row->invoice_date)->translatedFormat('g:i A') }}</div>
        <div>{{ \Carbon\Carbon::parse($row->invoice_date)->translatedFormat('jS M, Y') }}</div>
    </div>
@endif
