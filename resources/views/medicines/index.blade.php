@extends('layouts.app')
@section('title')
    {{ __('messages.medicine.medicines') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('medicineUrl',route('medicines.index'),['id'=>'indexMedicineUrl'])}}
            {{ Form::hidden('medicines-show-modal', url('medicines-show-modal'), ['id'=>'medicinesShowModal']) }}
            {{ Form::hidden('medicineLang',__('messages.delete.medicine'), ['id' => 'medicineLang']) }}
            <livewire:medicine-table/>
            @include('partials.page.templates.templates')
            @include('medicines.show_modal')
        </div>
    </div>
@endsection
{{--        let medicineUrl = "{{route('medicines.index')}}"--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/medicines/medicines.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}

