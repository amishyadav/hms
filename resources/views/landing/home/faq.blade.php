@extends('landing.layouts.app')
@section('title')
    {{ __('messages.faqs.faqs') }}
@endsection
@section('page_css')
    {{--    <link href="{{asset('assets/css/landing/landing.css')}}" rel="stylesheet" type="text/css"/>--}}
    <link href="{{ asset('landing_front/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <div class="faqs-page">

        <!-- start hero section -->
        <section class="hero-section pt-120 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-sm-4 mb-3">
                        <div class="hero-content">
                            @if(headerLanguageName() == 'ru')
                                <h2 class="mb-0">
                                    {{ __('messages.faqs.faqs') }}
                                </h2>
                            @else
                                <h1 class="mb-0">
                                    {{ __('messages.faqs.faqs') }}
                                </h1>
                            @endif
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-start justify-content-center mb-lg-0 pb-lg-4">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('landing-home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item text-cyan fs-18"
                                        aria-current="page">{{__('messages.landing.faqs')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <img src="{{asset('landing_front/images/about-hero-img.png')}}" alt="HMS-Sass"
                             class="img-fluid"/>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <!-- start-question-section -->
        <section class="question-section py-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="accordion" id="accordionExample">
                            @forelse($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{$faq->id}}">
                                        <button class="accordion-button {{$loop->first ? '' : 'collapsed'}} fs-18 p-lg-4 p-sm-3"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{$faq->id}}"
                                                aria-expanded="{{$loop->first ? 'true' : 'false'}}"
                                                aria-controls="collapseOne bg-white">
                                            {{$faq->question}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$faq->id}}"
                                         class="accordion-collapse collapse {{$loop->first ? 'show' : ''}}"
                                         aria-labelledby="heading-{{$faq->id}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="fs-14">{{$faq->answer}}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="row justify-content-center">
                                    {{__('We couldn\'t find any records')}}
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end-question-section -->

        <!-- start subscribe-section -->
    @include('landing.home.subscribe_section')
    <!-- end subscribe-section -->

    </div>

@endsection
