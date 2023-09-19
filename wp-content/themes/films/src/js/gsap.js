/// GSAP ///
import gsap from "gsap";
// import "../../node_modules/gsap/all.js";
// import { gsap } from "../../node_modules/gsap/all.js"; 
// import { gsap } from "../../node_modules/gsap/index.js";
import { ScrollTrigger } from "../../node_modules/gsap/ScrollTrigger";
// import { ScrollToPlugin } from "../../node_modules/gsap/ScrollToPlugin";
// import { DrawSVGPlugin } from "../../node_modules/gsap/DrawSVGPlugin";
// import { ScrollSmoother } from "../../node_modules/gsap/ScrollSmoother";
// import { GSDevTools } from "../../node_modules/gsap/GSDevTools"; 
// gsap.registerPlugin(
//     ScrollTrigger, ScrollToPlugin, DrawSVGPlugin, ScrollSmoother, GSDevTools
// );

gsap.registerPlugin(
    ScrollTrigger
);

// AD ADDED // homepage logo loading anim

// grab body as const
const body = document.querySelector('body');
// if body has class home = on homepage
if (body.classList.contains('home')) {
    gsap.set('#homepage-overlay svg path', {autoAlpha: 0});
    var homeTL = gsap.timeline({
        defaults: {duration: 1, ease: "power2.InOut", },
        // delay: 1,
        paused: true,
        reversed: true
    } );
    // homeTL.delay(4);
    homeTL
        .to("#homepage-overlay svg path", {
            autoAlpha: 1,
            stagger: -0.1
        })
        // .add(() => {}, "+=0.1") // delay
        .to("#homepage-overlay svg path", {
            autoAlpha: 0,
            stagger: -0.1
        })
        .to(".homepage-overlay", {
            autoAlpha: 0,
        })
    ;
    homeTL.play().delay(1);
}


// Create a GSAP timeline One
const one = gsap.timeline({
    scrollTrigger: {
        trigger: ".gsap-scroll-1", // Elements to trigger the animation
        start: "top bottom", // Start the animation when the top of the element reaches the bottom of the viewport
        end: "bottom top", // End the animation when the bottom of the element reaches the top of the viewport
        //markers: true, // Add debug markers to visualize the trigger area
        scrub: 1, // Smoothly animate elements as you scroll
    },
});

// Create a GSAP timeline Two
const two = gsap.timeline({
    scrollTrigger: {
        trigger: ".gsap-scroll-2", // Elements to trigger the animation
        start: "top bottom", // Start the animation when the top of the element reaches the bottom of the viewport
        end: "bottom top", // End the animation when the bottom of the element reaches the top of the viewport
        //markers: true, // Add debug markers to visualize the trigger area
        scrub: 1, // Smoothly animate elements as you scroll
    },
});

// Create a GSAP timeline Three
const three = gsap.timeline({
    scrollTrigger: {
        trigger: ".gsap-scroll-3", // Elements to trigger the animation
        start: "top bottom", // Start the animation when the top of the element reaches the bottom of the viewport
        end: "bottom top", // End the animation when the bottom of the element reaches the top of the viewport
        //markers: true, // Add debug markers to visualize the trigger area
        scrub: 1, // Smoothly animate elements as you scroll
    },
});

// Define the animation
// -Animation for the first div (move to the left)
one.fromTo(".gsap-scroll-1", { x: "0" }, { x: "-10%", stagger: 0.2, duration: 1 });

// -Animation for the second div (move to the right)
two.fromTo(".gsap-scroll-2", { x: "-10%" }, { x: "0", stagger: 0.2, duration: 1 });

// -Animation for the third div (move to the left)
three.fromTo(".gsap-scroll-3", { x: "0" }, { x: "-10%", stagger: 0.2, duration: 1 });


// Fade In Up
// const boxes = gsap.utils.toArray('.fade-in-up');

// gsap.utils.toArray('.fade-in-up').forEach(box => {
//     gsap.fromTo(box, {
//         autoAlpha: 0,
//         y: 50
//     }, {
//         scrollTrigger: {
//             trigger: box,
//             once: true,
//             start: "top bottom-=100px" // Trigger animation when the top of the div is 100px from the bottom
//         },
//         duration: 1,
//         autoAlpha: 1,
//         y: 0
//     });
// });

// const boxes_big = gsap.utils.toArray('.fade-in-up-big');

// gsap.utils.toArray('.fade-in-up-big').forEach(box => {
//     gsap.fromTo(box, {
//         autoAlpha: 0,
//         y: 100
//     }, {
//         scrollTrigger: {
//             trigger: box,
//             once: true
//         },
//         duration: 1.25,
//         autoAlpha: 1,
//         y: 0,
//         delay: 1, // 1-second delay for each element
//     });
// });

console.log('GSAP Go!');