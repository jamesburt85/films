// // off canvas nav
// import '../../node_modules/offside-js/dist/offside';
import offside from "offside-js";
import './components/offside.js';
import './components/secondary-nav-toggle.js';

$(".js-toggle-secondary-navigation").click(function() {
    $(".secondary-navigation").toggleClass("active");
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
// // import './gsap.js';

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