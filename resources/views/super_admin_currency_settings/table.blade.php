<div class="table-responsive-sm">
    <table class="table table-striped" id="currencySettings-table">
        <thead>
        <tr>
            <th>Country Name</th>
            <th>Country Code</th>
            <th>Country Icon</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($currencySettings as $currencySetting)
            <tr>
                <td>{{ $currencySetting->country_name }}</td>
                <td>{{ $currencySetting->country_code }}</td>
                <td>{{ $currencySetting->country_icon }}</td>
                <td>
                    {!! Form::open(['route' => ['currencySettings.destroy', $currencySetting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('currencySettings.show', [$currencySetting->id]) }}"
                           class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('currencySettings.edit', [$currencySetting->id]) }}"
                           class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
