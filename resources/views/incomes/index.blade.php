@extends('layouts.app')
@section('title')
    {{__('messages.incomes.incomes')}}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:income-table/>
            {{Form::hidden('incomeUrl',url('incomes'),['id'=>'indexIncomeUrl'])}}
            {{Form::hidden('incomeCreateUrl',route('incomes.store'),['id'=>'indexIncomeCreateUrl'])}}
            {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'indexIncomeDefaultDocumentImageUrl'])}}
            {{Form::hidden('incomeHeadArray',json_encode($incomeHeads),['id'=>'indexIncomeHeadArray'])}}
            {{Form::hidden('download',__('messages.incomes.download'),['id'=>'indexIncomeDownload'])}}
            {{Form::hidden('documentError',__('messages.incomes.document_error'),['id'=>'indexIncomeDocumentError'])}}
            {{Form::hidden('downloadDocumentUrl',url('income-download'),['id'=>'indexIncomeDownloadDocumentUrl'])}}
            {{ Form::hidden('incomeLang', __('messages.delete.income'), ['id' => 'incomeLang']) }}
            @include('partials.modal.templates.templates')
            @include('incomes.create_modal')
            @include('incomes.edit_modal')
        </div>
    </div>
@endsection
{{--let incomeUrl = "{{url('incomes')}}";--}}
{{--let incomeCreateUrl = "{{route('incomes.store')}}";--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--let incomeHeadArray = JSON.parse('@json($incomeHeads)');--}}
{{--let download = '{{__('messages.incomes.download')}}';--}}
{{--let documentError = "{{__('messages.incomes.document_error')}}";--}}
{{--let downloadDocumentUrl = "{{ url('income-download') }}";--}}
{{--    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>--}}
{{--    <script src="{{mix('assets/js/incomes/incomes.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
