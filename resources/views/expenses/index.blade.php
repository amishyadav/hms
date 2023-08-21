@extends('layouts.app')
@section('title')
    {{ __('messages.expenses') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:expense-table/>
        </div>
        {{Form::hidden('expenseUrl',url('expenses'),['id'=>'indexExpenseUrl'])}}
        {{Form::hidden('expenseCreateUrl',route('expenses.store'),['id'=>'indexExpenseCreateUrl'])}}
        {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'indexExpenseDefaultDocumentImageUrl'])}}
        {{Form::hidden('expenseHeadArray',json_encode($expenseHeads),['id'=>'indexExpenseHeadArray'])}}
        {{Form::hidden('download',__('messages.expense.download'),['id'=>'indexExpenseDownload'])}}
        {{Form::hidden('documentError',__('messages.expense.document_error'),['id'=>'indexExpenseDocumentError'])}}
        {{Form::hidden('downloadDocumentUrl',url('expense-download'),['id'=>'indexExpenseDownloadDocumentUrl'])}}
        {{ Form::hidden('expenseLang', __('messages.delete.expense'), ['id' => 'expenseLang']) }}
        @include('partials.modal.templates.templates')
        @include('expenses.create_modal')
        @include('expenses.edit_modal')
    </div>
@endsection
{{--let expenseUrl = "{{url('expenses')}}";--}}
{{--let expenseCreateUrl = "{{route('expenses.store')}}";--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--let expenseHeadArray = JSON.parse('@json($expenseHeads)');--}}
{{--let download = "{{__('messages.expense.download')}}";--}}
{{--let documentError = "{{__('messages.expense.document_error')}}";--}}
{{--let downloadDocumentUrl = "{{ url('expense-download') }}";--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/expenses/expenses.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
