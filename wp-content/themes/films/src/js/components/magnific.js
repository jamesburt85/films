$('.js-popup-link').magnificPopup({
    type: 'inline',
    midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});

$('.popup-vimeo').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
});

$('.js-image-popup').magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    closeOnContentClick: true,
    image: {
        verticalFit: false
    }
});

$('.js-popup-with-form').magnificPopup({
    type: 'inline',
    //mainClass: 'mfp-fade',
    //removalDelay: 160,
    preloader: false,
    focus: '#input_2_1_3_container',

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
        beforeOpen: function() {
            if ($(window).width() < 700) {
                this.st.focus = false;
            } else {
                this.st.focus = '#input_2_1_3_container';
            }
        }
    }
});