@extends('layouts.app')
@section('title')
    {{ __('messages.subscription.edit_subscription') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('subscriptions.list.index') }}"
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
            <div class="card mt-10">
                <div class="card-body p-12">
                    {{ Form::hidden('editEndAt', $subscription->ends_at->format('Y-m-d H:i'), ['class' => 'subscriptionEndAt']) }}
                    {{ Form::model($subscription, ['route' => ['subscriptions.list.update', $subscription->id], 'method' => 'patch', 'id' => 'editSubscription']) }}
                    @csrf
                    @include('subscription.edit_fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let editEndAt = '{{ $subscription->ends_at->format('Y-m-d H:i') }}';--}}
{{--    <script src="{{mix('assets/js/subscription/create-edit.js')}}"></script>--}}
