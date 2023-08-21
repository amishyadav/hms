@extends('layouts.app')
@section('title')
    {{ __('messages.incomes.income_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.incomes.income_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a data-id="{{ $incomes->id }}"
                   class="btn btn-primary me-2 me-2 me-2 editIncomesBtn">{{ __('messages.common.edit') }}</a>
                <a href="{{route('incomes.index')}}"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <div class="card">
                <div class="card-body">
                    @include('incomes.show_fields')
                    @include('incomes.edit_modal')
                    {{Form::hidden('incomeUrl',url('incomes'),['id'=>'indexIncomeUrl'])}}
                    {{Form::hidden('incomeUrl',url('incomes'),['id'=>'showIncomeUrl'])}}
                    {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'showIncomeDefaultDocumentImageUrl'])}}
                    {{Form::hidden('download',__('messages.incomes.download'),['id'=>'showIncomeDownload'])}}
                    {{Form::hidden('documentError',__('messages.incomes.document_error'),['id'=>'showIncomeDocumentError'])}}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let incomeUrl = "{{url('incomes')}}"--}}
{{--        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}"--}}
{{--        let download = '{{__('messages.incomes.download')}}'--}}
{{--        let documentError = "{{__('messages.incomes.document_error')}}"--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/incomes/incomes-details-edit.js')}}"></script>--}}
