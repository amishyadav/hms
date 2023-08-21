@extends('layouts.app')
@section('title')
    {{ __('messages.currency.currencies') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('currencyCreateUrl',route('currency-settings.store'),['id'=>'indexCurrencyCreateUrl'])}}
            {{Form::hidden('currenciesUrl',url('currency-settings'),['id'=>'indexCurrenciesUrl'])}}
            {{ Form::hidden('medicineCategoryLang', __('messages.delete.medicine_category'), ['id' => 'medicineCategoryLang']) }}
            <livewire:currency-table/>
            @include('currency_settings.modal')
            @include('currency_settings.edit-modal')
{{--            @include('categories.templates.templates')--}}
{{--            @include('partials.page.templates.templates')--}}
        </div>
    </div>
@endsection

