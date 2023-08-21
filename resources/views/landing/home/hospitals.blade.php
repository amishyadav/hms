@extends('landing.layouts.app')
@section('title')
    {{ __('messages.hospitals') }}
@endsection
@section('page_css')
{{--    <link href="{{mix('landing_front/css/home.css')}}" rel="stylesheet" type="text/css">--}}
@endsection
@section('content')
    <div class="home-page">
        <section class="hero-section pt-120 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-sm-4 mb-3">
                        <div class="hero-content">
                            <h1 class="mb-0">
                                {{ __('messages.hospitals') }}
                            </h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-start justify-content-center mb-lg-0 pb-lg-4">
                                    <li class="breadcrumb-item"><a
                                                href="{{ route('landing-home') }}">{{ __('messages.web_home.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item text-cyan fs-18"
                                        aria-current="page">{{ __('messages.hospitals') }}</li>
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

        <section class="our-hospitals-section py-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-heading">
                            <h2>{{ __('messages.our_hospitals') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="our-hospitals">
                    <div class="row">
{{--                        @dd(Auth::user())--}}
                        @foreach($hospitals as $hospital)
                            <div class="col-lg-4 col-md-6 mb-lg-5 mb-md-4 mb-3 d-flex align-items-stretch ps-4 ps-md-3">
                                <div class="card flex-fill ms-lg-4 me-xl-5 ms-md-4 me-md-2 ms-4 ps-1 ps-md-0">
                                    <a href="{{ route('front',$hospital->username) }}" data-turbo="false">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-md-2 col-1 ps-xl-2 ps-2">
                                                <img class="card-img rounded-circle"
                                                     src="{{ isset($hospital) ? asset($hospital['image_url']) : ''}}"
                                                     alt="New-Horizon">
                                            </div>
                                            <div class="col-md-10 col-11">
                                                <div class="card-body d-flex flex-column py-4">
                                                    <h3>{{ $hospital->full_name }}</h3>
                                                    <p class="card-text">{{ $hospital->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination-section">
                    {{ $hospitals->links() }}
                </div>
            </div>
        </section>
        @include('landing.home.subscribe_section')
    </div>
@endsection
@section('scripts')
{{--    <script>var toastData = ''</script>--}}
@endsection
