@extends('layouts.app')
@section('title')
    {{ __('messages.visitors') }}
@endsection
@section('page_css')
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/int-tel/css/intlTelInput.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            {{ Form::hidden('visitorUrl',true, ['id' => 'indexOfVisitor']) }}
            {{ Form::hidden('visitorUrl', route('visitors.index'), ['class' => 'visitorUrl']) }}
            {{ Form::hidden('downloadDocumentUrl', url('visitors-download'), ['class' => 'downloadDocumentUrl']) }}
            {{ Form::hidden('utilsScript', asset('assets/js/int-tel/js/utils.min.js'), ['class' => 'utilsScript']) }}
            {{ Form::hidden('isEdit', true, ['class' => 'isEdit']) }}
            {{ Form::hidden('visitorLang',__('messages.delete.visitor'), ['id' => 'visitorLang']) }}
            <livewire:visitor-table/>
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>--}}
{{--let visitorUrl = "{{ route('visitors.index') }}/";--}}
{{--let downloadDocumentUrl = "{{ url('visitors-download') }}";--}}
{{--let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";--}}
{{--let isEdit = true;--}}
{{--    <script src="{{mix('assets/js/visitors/visitor.js')}}"></script>--}}
