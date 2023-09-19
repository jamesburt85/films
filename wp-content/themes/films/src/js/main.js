// // off canvas nav
// import '../../node_modules/offside-js/dist/offside';
import offside from "offside-js";
import './components/offside.js';
//import './components/secondary-nav-toggle.js';

$(".js-toggle-secondary-navigation").click(function() {
    $(".secondary-navigation--container").toggleClass("active");
    $(this).removeClass("is-active");
});
$(".js-close-secondary-navigation").click(function() {
    $(".secondary-navigation--container").toggleClass("active");
});

$(".site-header-mobile-toggle").click(function() {
    $("body").toggleClass("burger-active");
});
// // jQuery
// import '../../node_modules/jquery/dist/jquery';
import jquery from "jquery";
$(document).ready(() => { console.log("hello dddddd"); });

// // Photoswipe
// import PhotoSwipeLightbox from "photoswipe";
import PhotoSwipeLightbox from 'photoswipe/lightbox';
// import PhotoSwipeLightbox from '../../node_modules/photoswipe/dist/photoswipe-lightbox.esm.js';
import PhotoSwipe from '../../node_modules/photoswipe/dist/photoswipe.esm.js';

const lightbox = new PhotoSwipeLightbox({
    gallery: '.js-photoswipe',
    children: 'a',
    pswpModule: PhotoSwipe
});

lightbox.init();

// // GSAP
import './gsap.js';

// import gsap from "gsap";

// gsap.to(".entry-content > *", {
//     duration: 2,
//     scale: 0.5,
//     opacity: 0,
//     stagger: 0.2
// });

//console.log('GSAP Go!');

// Accessible Slick
import { slick } from '@accessible360/accessible-slick/slick/slick';
import './components/slick.js';

// // Magnific Popup (requires jQuery)
import magnific from 'magnific-popup';
// // import { magnific } from '../../node_modules/magnific-popup/dist/jquery.magnific-popup';
import './components/magnific.js';


//BEGIN accordion
$(".accordion__title").on("click", function(e) {

    e.preventDefault();
    var $this = $(this);

    if (!$this.hasClass("accordion-active")) {
        $(".accordion__content").slideUp(400);
        $(".accordion__title").removeClass("accordion-active");
        $('.accordion__arrow').removeClass('accordion__rotate');
    }

    $this.toggleClass("accordion-active");
    $this.next().slideToggle();
    $('.accordion__arrow', this).toggleClass('accordion__rotate');
});
//END accordion


// Scroll Classes
$(window).scroll(function() {
    if ($(this).scrollTop() > 20) {
        $('body').addClass('scrolledDown');
    } else {
        $('body').removeClass('scrolledDown');
    }
});


///////////////////
// SMOOTH SCROLL //
///////////////////

// Select all links with hashes
// $('a[href*="#"]')
//     // Remove links that don't actually link to anything
//     .not('[href="#"]')
//     .click(function(event) {
//         $("a").removeClass('active');
//         $(this).toggleClass('active');
//         // On-page links
//         if (
//             location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
//             location.hostname == this.hostname
//         ) {
//             // Figure out element to scroll to
//             var target = $(this.hash);
//             target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//             // Does a scroll target exist?
//             if (target.length) {
//                 // Only prevent default if animation is actually gonna happen
//                 event.preventDefault();
//                 $('html, body').animate({
//                     scrollTop: target.offset().top + (-180)
//                 }, 1000, function() {
//                     // Callback after animation
//                     // Must change focus!
//                     var $target = $(target);
//                     $target.focus();
//                     if ($target.is(":focus")) { // Checking if the target was focused
//                         return false;
//                     } else {
//                         $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
//                         $target.focus(); // Set focus again
//                     };
//                 });
//             }
//         }
//     });

// Smooth scrolling for all anchor links with a hash (#) in the href attribute
// $('a[href^="#"]').on('click', function(e) {
//     e.preventDefault();

//     var target = $(this.hash);
//     if (target.length) {
//         $('html, body').animate({
//             scrollTop: target.offset().top
//         }, {
//             duration: 1000,
//             easing: 'linear' // Set easing to 'linear' for no easing
//         });
//     }
// });


$(window).on('load', function() {
    $(".js-loader").addClass('loader-fade-out');
});

/// GSAP ///
// import "../../node_modules/gsap/all.js";
// import { gsap } from "../../node_modules/gsap/all.js"; 
// import { gsap } from "../../node_modules/gsap/index.js";
// import { ScrollTrigger } from "../../node_modules/gsap/ScrollTrigger";
// import { ScrollToPlugin } from "../../node_modules/gsap/ScrollToPlugin";
// import { DrawSVGPlugin } from "../../node_modules/gsap/DrawSVGPlugin";
// import { ScrollSmoother } from "../../node_modules/gsap/ScrollSmoother";
// import { GSDevTools } from "../../node_modules/gsap/GSDevTools"; 
// gsap.registerPlugin(
//     ScrollTrigger, ScrollToPlugin, DrawSVGPlugin, ScrollSmoother, GSDevTools
// );