<!-- Country Name Field -->
<div class="form-group">
    {!! Form::label('country_name', 'Country Name:') !!}
    <p>{{ $currencySetting->country_name }}</p>
</div>

<!-- Country Code Field -->
<div class="form-group">
    {!! Form::label('country_code', 'Country Code:') !!}
    <p>{{ $currencySetting->country_code }}</p>
</div>

<!-- Country Icon Field -->
<div class="form-group">
    {!! Form::label('country_icon', 'Country Icon:') !!}
    <p>{{ $currencySetting->country_icon }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $currencySetting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $currencySetting->updated_at }}</p>
</div>

