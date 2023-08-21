<!-- Country Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_name', 'Country Name:') !!}
    {!! Form::text('country_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_icon', 'Country Icon:') !!}
    {!! Form::text('country_icon', null, ['class' => 'form-control']) !!}
</div>
<!-- Country Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_code', 'Country Code:') !!}
    {!! Form::text('country_code', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('currencySettings.index') }}" class="btn btn-secondary">Cancel</a>
</div>
