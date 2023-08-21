@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_test.edit_radiology_test') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('radiology.test.index') }}"
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
                    {{ Form::hidden('radiologyTestUrl', url('radiology-tests'), ['class' => 'radiology-test-url']) }}
                    {{ Form::model($radiologyTest, ['route' => ['radiology.test.update', $radiologyTest->id], 'method' => 'patch', 'id' => 'editRadiologyTest']) }}

                    @include('radiology_tests.edit_fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let radiologyTestUrl = "{{url('radiology-tests')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/radiology_tests/create-edit.js')}}"></script>--}}
