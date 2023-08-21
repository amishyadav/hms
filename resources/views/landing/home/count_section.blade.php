<section class="service-section bg-secondary py-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-6 mb-lg-0 mb-md-5 mb-4">
                <div class="card border-0 bg-secondary">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-3 align-items-center text-sm-start text-center mb-sm-0 mb-3">
                            <img class="card-img"
                                 src="{{ isset($sectionFive['card_img_url_one']) ? asset($sectionFive['card_img_url_one']) : ''}}"
                                 alt="services">
                        </div>
                        <div class="col-sm-9 text-sm-start text-center">
                            <div class="card-body p-0 ps-lg-3">
                                <h2 class="mb-0 text-white">{{$sectionFive['card_one_number']}}</h2>
                                <p class="card-text text-white">{{$sectionFive['card_one_text']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 mb-lg-0 mb-md-5 mb-4">
                <div class="card border-0 bg-secondary">
                    <div class="row justify-content-between align-items-center">
                        <div class=" col-sm-3 text-sm-start text-center align-items-center mb-sm-0 mb-3">
                            <img class="card-img"
                                 src="{{ isset($sectionFive['card_img_url_two']) ? asset($sectionFive['card_img_url_two']) : ''}}"
                                 alt="Team-Members">
                        </div>
                        <div class="col-sm-9 text-sm-start text-center">
                            <div class="card-body p-0 ps-lg-3">
                                <h2 class="mb-0 text-white">{{$sectionFive['card_two_number']}}</h2>
                                <p class="card-text text-white">{{$sectionFive['card_two_text']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 mb-lg-0 ">
                <div class="card border-0 bg-secondary">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-3 text-center text-sm-start align-items-center mb-sm-0 mb-3">
                            <img class="card-img"
                                 src="{{ isset($sectionFive['card_img_url_three']) ? asset($sectionFive['card_img_url_three']) : ''}}"
                                 alt="Happy-Patients">
                        </div>
                        <div class="col-sm-9 text-sm-start text-center ">
                            <div class="card-body p-0 ps-lg-3">
                                <h2 class="mb-0 text-white">{{$sectionFive['card_three_number']}}</h2>
                                <p class="card-text text-white">{{$sectionFive['card_three_text']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 mb-lg-0">
                <div class="card border-0 bg-secondary">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-3 text-sm-start text-center align-items-center mb-sm-0 mb-3">
                            <img class="card-img"
                                 src="{{ isset($sectionFive['card_img_url_four']) ? asset($sectionFive['card_img_url_four']) : ''}}"
                                 alt="Tonic-Research">
                        </div>
                        <div class="col-sm-9 text-sm-start text-center">
                            <div class="card-body p-0 ps-lg-3">
                                <h2 class="mb-0 text-white">{{$sectionFive['card_four_number']}}</h2>
                                <p class="card-text text-white">{{$sectionFive['card_four_text']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
