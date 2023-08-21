<section class="grow-your-hospital-section py-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-heading ">
                    <h2 class="mb-3">{{ $sectionFour['text_main'] }}</h2>
                    <p class="mb-0">{{ $sectionFour['text_secondary'] }}</p>
                </div>
            </div>
        </div>
        <div class="about-hospital">
            <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card ">
                        <img class="card-img mb-3"
                             src="{{ isset($sectionFour['img_url_one']) ? asset($sectionFour['img_url_one']) : asset('landing_front/images/seo.png')}}"
                             alt="Built SEO">
                        <div class="card-body p-0">
                            <h3>{{ $sectionFour['card_text_one'] }}</h3>
                            <p class="card-text">{{ $sectionFour['card_text_one_secondary'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card ">
                        <img class="card-img mb-3"
                             src="{{ isset($sectionFour['img_url_two']) ? asset($sectionFour['img_url_two']) : asset('landing_front/images/profile.png')}}"
                             alt="Hospital Profile">
                        <div class="card-body p-0">
                            <h3>{{ $sectionFour['card_text_two'] }}</h3>
                            <p class="card-text">{{ $sectionFour['card_text_two_secondary'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card ">
                        <img class="card-img mb-3"
                             src="{{ isset($sectionFour['img_url_three']) ? asset($sectionFour['img_url_three']) : asset('landing_front/images/online.png')}}"
                             alt="Online Appointment">
                        <div class="card-body p-0">
                            <h3>{{ $sectionFour['card_text_three'] }}</h3>
                            <p class="card-text">{{ $sectionFour['card_text_three_secondary'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card ">
                        <img class="card-img img mb-3"
                             src="{{ isset($sectionFour['img_url_four']) ? asset($sectionFour['img_url_four']) : asset('landing_front/images/articles.png')}}"
                             alt="Articles">
                        <div class="card-body p-0">
                            <h3>{!! $sectionFour['card_text_four'] !!}</h3>
                            <p class="card-text">{{ $sectionFour['card_text_four_secondary'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card ">
                        <img class="card-img img mb-3"
                             src="{{ isset($sectionFour['img_url_five']) ? asset($sectionFour['img_url_five']) : asset('landing_front/images/easy.png')}}"
                             alt="Easy to Use">
                        <div class="card-body p-0">
                            <h3>{{ $sectionFour['card_text_five'] }}</h3>
                            <p class="card-text">{{ $sectionFour['card_text_five_secondary'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card ">
                        <img class="card-img mb-3"
                             src="{{ isset($sectionFour['img_url_six']) ? asset($sectionFour['img_url_six']) : asset('landing_front/images/support.png')}}"
                             alt="24*7 Support">
                        <div class="card-body p-0">
                            <h3>{{ $sectionFour['card_text_six'] }}</h3>
                            <p class="card-text">{{ $sectionFour['card_text_six_secondary'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
