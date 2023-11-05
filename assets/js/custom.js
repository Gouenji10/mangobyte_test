jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $("#header-grid").addClass("sticky");
        } else {
            $("#header-grid").removeClass("sticky");
        }
    });

    $('.testimonial-wrapper').slick({
        arrows: true,
        responsive: [            
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,

                }
            }
        ]
    });

    $('.achievement-wrapper').slick({
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,

                }
            }
        ]

    });

    $('#go_top').on("click", function () {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });
})