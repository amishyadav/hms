@extends('layouts.app')
@section('title')
    {{ __('messages.issued_item.new_issued_item') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('issued.item.index') }}"
                   class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
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
                {{Form::hidden('usersUrl',route('users.list'),['id'=>'itemIssuedUsersUrl'])}}
                {{Form::hidden('itemsUrl',route('items.list'),['id'=>'issuedItemsUrl'])}}
                {{Form::hidden('itemAvailableQtyUrl',route('item.available.qty'),['id'=>'issuedItemAvailableQtyUrl'])}}
                <div class="card-body">
                    {{ Form::open(['route' => 'issued.item.store', 'id' => 'createIssuedItemForm']) }}

                    @include('issued_items.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--        let usersUrl = "{{ route('users.list') }}";--}}
{{--        let itemsUrl = "{{ route('items.list') }}";--}}
{{--        let itemAvailableQtyUrl = "{{ route('item.available.qty') }}";--}}
{{--    <script src="{{ mix('assets/js/issued_items/create.js') }}"></script>--}}
