@extends('layouts.app')
@section('title')
    {{__('messages.admins')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{ Form::hidden('adminUrl', url('super-admin/admins'), ['id' => 'adminUrl']) }}
            {{ Form::hidden('admin', __('messages.admin'), ['id' => 'Admin']) }}
            <livewire:admin-table/>
        </div>
    </div>
@endsection

