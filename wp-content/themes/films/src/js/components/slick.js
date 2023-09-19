////////////////////////////////
// SLICK SLIDER (ACCESSIBLE) //
////////////////////////////////

// js-slider
$('.js-slick').slick({
    autoplay: false,
    dots: false,
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    responsive: [{
            breakpoint: 700,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 400,
            settings: {
                slidesToShow: 2
            }
        }
    ]
});

// js-slider hero
$('.js-slick-hero').slick({
    autoplay: true,
    dots: false,
    arrows: false,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    infinite: true,
});