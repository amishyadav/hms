@extends('layouts.app')
@section('title')
    {{ __('messages.expense.expense_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.expense.expense_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary me-2 me-2 editExpensesBtn"
                   data-id="{{ $expenses->id }}">{{ __('messages.common.edit') }}</a>
                <a href="{{route('expenses.index')}}"
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
                    @include('expenses.show_fields')
                    @include('expenses.edit_modal')
                </div>
            </div>
            {{Form::hidden('expenseUrl',url('expenses'),['id'=>'indexExpenseUrl'])}}
            {{Form::hidden('expenseUrl',url('expenses'),['id'=>'showExpenseUrl'])}}
            {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'showExpenseDefaultDocumentImageUrl'])}}
            {{Form::hidden('download',__('messages.expense.download'),['id'=>'showExpenseDownload'])}}
            {{Form::hidden('documentError',__('messages.expense.document_error'),['id'=>'showExpenseDocumentError'])}}
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--let expenseUrl = "{{url('expenses')}}"--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}"--}}
{{--let download = "{{__('messages.expense.download')}}"--}}
{{--let documentError = "{{__('messages.expense.document_error')}}"--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/expenses/expenses-details-edit.js')}}"></script>--}}
