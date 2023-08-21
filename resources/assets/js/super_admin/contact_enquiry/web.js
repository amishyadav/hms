window.addEventListener('turbo:load', loadWebMessage)

function loadWebMessage () {

    if (!$('.testimonial-carousel').length) {
        return
    }

    $('.testimonial-carousel').slick({
        dots: true,
        autoplay: false,
        autoplayspeed: 1600,
        centerPadding: '0',
        slidesToShow: 1,
        slidesToScroll: 1,
    })
    
    $('.services').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplayspeed: 1600,
        centerPadding: '0',
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    })

    // function paymentMessage(data = null) {
    //     // toastData = data != null ? data : toastData;
    //     toastData = data;
    //     if (toastData !== null) {
    //         setTimeout(function () {
    //             $.toast({
    //                 heading: toastData.toastType,
    //                 icon: toastData.toastType,
    //                 bgColor: '#7603f3',
    //                 textColor: '#ffffff',
    //                 text: toastData.toastMessage,
    //                 position: 'top-right',
    //                 stack: false,
    //             });
    //         }, 1000);
    //     }
    // }
    // paymentMessage();
}


