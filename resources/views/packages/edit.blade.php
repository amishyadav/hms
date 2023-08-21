@extends('layouts.app')
@section('title')
    {{ __('messages.package.edit_package') }}
@endsection
@section('page_css')
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('css')
{{--    <link href="{{ asset('assets/css/bill.css') }}" rel="stylesheet" type="text/css"/>--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('packages.index') }}"
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
                {{Form::hidden('packageSaveUrl',route('packages.update', $package->id),['class'=>'packageSaveUrl','id'=>'editPackageSaveUrl'])}}
                {{Form::hidden('packageUrl',route('packages.index'),['class'=>'packageUrl','id'=>'editPackageUrl'])}}
                {{Form::hidden('uniqueId',$package->packageServicesItems->count() + 1,['class'=>'packageUniqueId'])}}
                {{Form::hidden('associateServices',json_encode($services),['class'=>'associateServices'])}}
                {{ Form::hidden('packageReportUrl', url('packages'), ['class' => 'packageReportUrl']) }}
                <div class="card-body">
                    {{ Form::model($package, ['route' => ['packages.update', $package->id], 'id'=>'packageForm', 'class'=>'packageForm']) }}

                    @include('packages.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @include('packages.templates.templates')
    </div>
@endsection
{{--    <script src="{{ asset('landing_front/js/jquery.toast.min.js') }}"></script>--}}
{{--        let packageSaveUrl = "{{ route('packages.update', $package->id) }}"--}}
{{--        let packageUrl = "{{route('packages.index')}}"--}}
{{--        let associateServices = JSON.parse('@json($services)')--}}
{{--        let uniqueId = "{{ $package->packageServicesItems->count() + 1 }}"--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/packages/create-edit.js') }}"></script>--}}
