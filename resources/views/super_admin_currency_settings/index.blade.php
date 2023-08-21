@extends('layouts.app')
@section('title')
   {{ __('messages.currency.currencies') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('currencyCreateUrl',route('super-admin-currency-settings.store'),['id'=>'indexAdminCurrencyCreateUrl'])}}
            {{Form::hidden('currenciesUrl',route('super-admin-currency-settings.index'),['id'=>'indexAdminCurrenciesUrl'])}}
            {{ Form::hidden('medicineCategoryLang', __('messages.delete.medicine_category'), ['id' => 'medicineCategoryLang']) }}
            <livewire:super-admin-currency-table/>
            @include('super_admin_currency_settings.modal')
            @include('super_admin_currency_settings.edit-modal')
            {{--            @include('categories.templates.templates')--}}
            {{--            @include('partials.page.templates.templates')--}}
        </div>
    </div>
@endsection

