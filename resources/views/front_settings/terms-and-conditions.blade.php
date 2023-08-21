@extends('front_settings.index')
@section('title')
    {{ __('messages.front_settings') }}
@endsection
@section('section')
    <div class="d-md-flex align-items-center justify-content-between mb-7">
        <h1 class="mb-0"> {{ __('messages.front_setting.terms_condition_details') }} </h1>
    </div>
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => ['front.settings.update'], 'method' => 'post', 'files' => true, 'id' => 'termsAndCondition']) }}
            {{ Form::hidden('sectionName', $sectionName) }}
            <div class="alert alert-danger d-none hide" id="validationErrorsBox"></div>
            <div class="row mt-3 mb-5">
                <!-- Term condition Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('term_condition', __('messages.front_setting.terms_conditions').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    <div id="termConditionId" class="editor-height" style="height: 100px"></div>
                    {{ Form::hidden('terms_conditions', null, ['id' => 'termData']) }}
                </div>

                <!-- Privacy policy Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('privacy_policy', __('messages.front_setting.privacy_policy').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    <div id="privacyPolicyId" class="editor-height" style="height: 100px"></div>
                    {{ Form::hidden('privacy_policy', null, ['id' => 'privacyData']) }}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            {{Form::hidden('termConditionData',$frontSettings['terms_conditions'],['class'=>'termConditionData'])}}
            {{Form::hidden('privacyPolicyData',$frontSettings['privacy_policy'],['class'=>'privacyPolicyData'])}}
            {{Form::hidden('termConditionPrivacyPolicy',true,['id'=>'termConditionPrivacyPolicy'])}}
                <!-- Submit Field -->
                <div class="modal-footer p-0">
                    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
                    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary ms-2']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
{{--        let termConditionData = `{{$frontSettings['terms_conditions']}}`;--}}
{{--        let privacyPolicyData = `{{$frontSettings['privacy_policy']}}`;--}}
{{--        let termConditionPrivacyPolicy = true;--}}
{{--    <script src="{{mix('assets/js/front_settings/cms/create-edit.js')}}"></script>--}}
