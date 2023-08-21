@extends('layouts.app')
@section('title')
    {{ __('messages.insurance.new_insurance') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('insurances.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{Form::hidden('insuranceSaveUrl',route('insurances.store'),['id'=>'createInsuranceSaveUrl','class'=>'insuranceSaveUrl'])}}
                    {{Form::hidden('insuranceUrl',route('insurances.index'),['id'=>'createInsuranceUrl','class'=>'insuranceUrl'])}}
                    {{Form::hidden('uniqueId',2,['id'=>'insuranceUniqueId','class'=>'insuranceUniqueId'])}}
                    {{Form::hidden('discount',-1,['id'=>'insuranceDiscount','class'=>'insuranceDiscount'])}}
                    {{ Form::open(['route' => 'insurances.store', 'id'=>'insuranceForm']) }}

                    @include('insurances.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('insurances.templates.templates')
    </div>
@endsection
{{--        let insuranceSaveUrl = "{{route('insurances.store')}}";--}}
{{--        let insuranceUrl = "{{route('insurances.index')}}";--}}
{{--        let uniqueId = 2;--}}
{{--        let discount = -1;--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/insurances/create-edit.js') }}"></script>--}}
