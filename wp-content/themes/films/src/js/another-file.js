console.log('123 123 another file included');

// testing GSAP
// create a timeline
// let tl = gsap.timeline()

// add the tweens to the timeline - Note we're using tl.to not gsap.to
// tl.to(".entry-content > *", { x: 600, duration: 2 });



////////////////////////////////
// FADE IN ON SCROLL          //
// GSAP SCROLLTRIGGER         //
////////////////////////////////

// const fadeInElems = gsap.utils.toArray(
//   '.entry-content > *'
//   );

// // const fadeInElems = gsap.utils.toArray(
// //   '.block-statement > *, .block-quote, .block-fbs > *, .block-cta, .block-fbl > div > *, .block-badges > div > *, .block--usp_cards > *, .block-feature-card-row .card, .block-form, .block-pcon > div > *, .block-basic-card-row, body.archive .entry-content .page-title, body.archive .entry-content .card, body.single .post-header--content, body.single .entry-content, body.single .gated-form, .leadership-grid > *'
// //   );

// // .block-hero .hero--content--inner-wrapper > *, 

// // Set things up
// gsap.set(fadeInElems, {autoAlpha: 0, y: 30});
// // gsap.set(fadeInElems, {autoAlpha: 0 });

// fadeInElems.forEach((box, i) => {
//   // Set up your animation
//   const anim = gsap.to(box, {duration: 0.8, autoAlpha: 1, y: 0, paused: true});
  
//   // Use callbacks to control the state of the animation
//   ScrollTrigger.create({
//     trigger: box,
//     end: "bottom 80%",
//     once: true,
//     onEnter: self => {
//       // If it's scrolled past, set the state
//       // If it's scrolled to, play it
//       self.progress === 1 ? anim.progress(1) : anim.play()
//     }
//   });
// });