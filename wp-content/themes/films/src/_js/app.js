//////////////////////////////
/// DISABLE CONSOLE LOGS /////
//////////////////////////////
// console.log = function () {};

// import { gsap, Power4, Linear, ScrollTrigger } from 'gsap';

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

import { DrawSVGPlugin } from "gsap/DrawSVGPlugin";
import { ScrollSmoother } from "gsap/ScrollSmoother";
import { GSDevTools } from "gsap/GSDevTools"; 

/*
DrawSVGPlugin.min.js, ScrollSmoother.min.js, and GSDevTools.min.js are Club GreenSock perks

import { DrawSVGPlugin } from "gsap/DrawSVGPlugin";
import { ScrollSmoother } from "gsap/ScrollSmoother";
import { GSDevTools } from "gsap/GSDevTools";

Sign up at https://greensock.com/club or try them for free on CodePen or CodeSandbox
*/


gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, DrawSVGPlugin, ScrollSmoother, GSDevTools);


// /////////////////////////////////
// / BREAKPOINTS IN BODY CLASS /////
// /////////////////////////////////

const jquery = require('jquery');

$ = window.$ = window.jQuery = jquery;

console.log('APP ---- R-A-Y 123');   

// IE FIXES
// missing forEach on NodeList for IE11
if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = Array.prototype.forEach;
}

// $mq-breakpoints: (mobile: 320px,
// tablet: 740px,
// desktop: 980px,
// wide: 1300px) !default;

var Breakpoints = {
  'mobileMax': 739,
  'tabletMin': 740,
  'tabletMax': 979,
  'desktopMin': 980
};

function breakpointClass() {
    var width = window.outerWidth,
        $body = $('body');

    // Remove any previously set breakpoint class.
    $body.removeClass('breakpoint-mobile breakpoint-tablet breakpoint-desktop');

    // Set breakpoint class based on window width.
    if (width >= Breakpoints.desktopMin) {
      $body.addClass('breakpoint-desktop');
    } else if (width <= Breakpoints.mobileMax) {
      $body.addClass('breakpoint-mobile');
    } else {
      $body.addClass('breakpoint-tablet');
    }
}


///////////////////
/// LAZY LOAD /////
///////////////////

$(document).on('lazyloaded', function(e) {
    // console.log('** lazyloaded is fired', e.target);  
})

$(document).on('lazybeforeunveil', function(e) {
    
    // console.log('lazyloader baby!', e.target);
    consoleLog('lazyloader', 'warning');

    var viewportWidth = $(window).innerWidth();
    // var bg = $(e.target).data('bg-mobile');
    var bg = $(e.target).data('bg-mobile');
    if (viewportWidth > 0) {
        bg = $(e.target).data('bg-mobile');
    }
    if (viewportWidth > 768) {
        bg = $(e.target).data('bg-tablet');
    }
    if (viewportWidth > 1023) {
        bg = $(e.target).data('bg-desktop');
    }
    if (viewportWidth > 1800) {
        bg = $(e.target).data('bg-super');
    } 

    if (bg) {
      // $(e.target).css('background-image', 'url(' + bg + ')');
      // gsap.set($($(e.target)), {backgroundImage:'url(' + bg + ')'});
      // Also if you're going to use the css wrapper it shoud be like this:
      // gsap.set($(e.target),   {opacity:0}); // delay: 1

      // var giveFadeInClass = function(){
        // $(e.target).addClass('fade-in');
      // }

      gsap.set($(e.target),   {css:{backgroundImage:'url(' + bg + ')'}, delay: 0.4}); // onComplete:giveFadeInClass

      // gsap.to($(e.target),    0.5,  {opacity:1, delay: 0.5}); // delay: 1
      
      // // in case of issues with opacity
      // var setOpacityTo1 = function(){
      //   console.log('%c setOpacityTo1 called', 'color: #bada55, background: #000');
      //   console.log($(e.target));
      //   gsap.set($(e.target),   {opacity:1});
      // }
      // gsap.delayedCall(6, setOpacityTo1);  

    }

}); 

///////////////////////////////////////
/// LAZY LOAD BG IMGS, set in CSS /////
///////////////////////////////////////


// lazyload curve bg images..
// https://imagekit.io/blog/lazy-loading-images-complete-guide/

document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages;   

  if ("IntersectionObserver" in window) {
    lazyloadImages = document.querySelectorAll(".js-lazy-bg-image");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          // console.log(image);
          image.classList.remove("js-lazy-bg-image");
          image.classList.add("lazy-bg-image-lazyloaded");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      // console.log(image);
      imageObserver.observe(image);
    });
  } else {  
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".js-lazy-bg-image");
    
    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }

      lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('js-lazy-bg-image');
              image.classList.add("lazy-bg-imagelazyloaded");
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
      }, 20);
    }

    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
  }
});


///////////////////
/// UTILITIES /////
///////////////////

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

/////////////////////////////////////////
/// ADD OUTLINES FOR KEYBOARD USERS /////
/////////////////////////////////////////
function handleFirstTab(e) {
  if (e.keyCode === 9) {
    document.body.classList.add('user-is-tabbing');
    window.removeEventListener('keydown', handleFirstTab);
  }
}

window.addEventListener('keydown', handleFirstTab);


///////////////////////////////////
/// console.log() replacement /////
///////////////////////////////////

var $enableCustomLog = false;
    $enableCustomLog = true;

function consoleLog(message, color='teal') {

    if (!$enableCustomLog) {return;}

     switch (color) {
         case 'success':  
              color = 'Green'
              break
         case 'info':     
                 color = '#4d87fd'  
              break;
         case 'error':   
              color = 'Red'   
              break;
         case 'warning':  
              color = 'Orange' 
              break;
         default: 
              color = color
     }

     console.log('%c'+message, 'color:'+color);
}

// consoleLog('Hello World!');
// consoleLog('Success!', 'success');
// consoleLog('Error!', 'error');
// consoleLog('Warning!', 'warning');
// consoleLog('Info...', 'info');
consoleLog('ZAPPP!!', 'warning');

var scriptInit = function(){

    // Breakpoint
    breakpointClass();

    // GSAP DEFAULTS
    // gsap.defaultEase = Back.easeOut;

    /////////////////////////////////////////////////////////////////////////////////////////////
    // Toggle on grid                                                                        / //
    /////////////////////////////////////////////////////////////////////////////////////////////

    window.onkeyup = function(e) {
       var key = e.keyCode ? e.keyCode : e.which;

       if (key == 71) {
          $('html').addClass('show-grid');
       } else if(key == 76) {
          $('html').addClass('show-lines');
       } else if (key == 27) {
           $('html').removeClass('show-grid');
           $('html').removeClass('show-lines');
       }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////
    // Mobile height 100vh fix - https://css-tricks.com/the-trick-to-viewport-units-on-mobile/ //
    /////////////////////////////////////////////////////////////////////////////////////////////

    // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
    let vh = window.innerHeight * 0.01;
    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    
    // We listen to the resize event
    window.addEventListener('resize', () => {
      // We execute the same script as before
      let vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    });

    ///////////////////////////////
    // LAZY LOAD Sizes in RESIZE //
    ///////////////////////////////

    var onResize = debounce(function() {

        console.log('resize triggered');
        // VARS
        var viewportWidth = $(window).innerWidth();

        // breakpoints-in-body-class
        breakpointClass();

        /// LAZY SIZES FOR BACKGROUNDS....
        // console.log('onResize fired. viewportWidth is', viewportWidth);
        $.each($(".lazyloaded"), function(index, item) {
            var bg = $(item).data('bg-mobile');
            if (viewportWidth > 0) {
                bg = $(item).data('bg-mobile');
            }
            if (viewportWidth > 768) {
                bg = $(item).data('bg-tablet');
            }
            if (viewportWidth > 1023) {
                bg = $(item).data('bg-desktop');
            }
            if (viewportWidth > 1800) {
                bg = $(item).data('bg-super');
            }
            if (bg) {
                // console.log('lazyloader resize!', $(item), ' - onResize fired. viewportWidth is', viewportWidth);
                $(item).css('background-image', 'url(' + bg + ')');
            }
        });

    }, 250);

    window.addEventListener('resize', onResize);


    ////////////////////////////////
    // COPY TO CLIPBOARD TOGGLE.  //
    ////////////////////////////////

    // var clipboard = new Clipboard('.clipboard-btn');

    // clipboard.on('success', function(e) {
    //     console.info('Action:', e.action);
    //     console.info('Text:', e.text);
    //     console.info('Trigger:', e.trigger);

    //     e.clearSelection();

    //     $('#clipboard-btn').text('link copied');

    // });

    // clipboard.on('error', function(e) {
    //     console.error('Action:', e.action);
    //     console.error('Trigger:', e.trigger);

    //     $('#clipboard-btn').text('error!');

    // });


    ///////////////////
    // MENU TOGGLE.  //
    ///////////////////

    // body.menu-is-open
    $("body .js-menu-toggle").click(function(event) {
      toggleClassMenu();
    });

    var toggleClassMenu = function() {

      $('.js-menu-toggle.hamburger').toggleClass('is-active');
      $('body').toggleClass('menu-is-open');

      var $labelCopy = $('js-hamburger--label').text();
      console.log( $labelCopy );
      if($labelCopy == 'Menu') {
        $('js-hamburger--label').text('Close');
      } else {
        $('js-hamburger--label').text('Menu');        
      }

      // console.log('%c menu toggled', 'background:#000; color:#fff');
      // $("body .off-canvas-menu").addClass("off-canvas-menu--animatable");   
      // if(!$("body .off-canvas-menu").hasClass("off-canvas-menu--visible")) {       
      //   $("body .off-canvas-menu").addClass("off-canvas-menu--visible");
      //   $('body').addClass('menu-open');
      //   $('html').addClass('menu-open');
      // } else {
      //   $("body .off-canvas-menu").removeClass('off-canvas-menu--visible');
      //   $('body .off-canvas-news-list').removeClass('off-canvas-news-list--visible');
      //   $('body').removeClass('menu-open');    
      //   $('body').removeClass('news-list-open');
        
      //   var removeClassFromHTML = function(){
      //     $('html').removeClass('menu-open');  
      //     $("body .off-canvas-menu").removeClass("off-canvas-menu--animatable");
      //   }

      //   gsap.delayedCall(0.2, removeClassFromHTML);   
      // }   

    }

    ///////////////////
    // DEVBAR        //
    ///////////////////

    // js-toggle-grid
    // js-toggle-columns
    // js-toggle-outlines
    // js-toggle-a11y
    // js-toggle-markup

    // body.menu-is-open
    $("body .js-devbar-toggle").click(function(e) {
      e.preventDefault();
      let $toggleClass = $(this).data('toggle');
      console.log('devbar toggle' + $toggleClass);
      $('body').toggleClass($toggleClass);
      $(this).toggleClass('is-active');
    });


    // function disp( divs ) {
    //   var a = [];
    //   for ( var i = 0; i < divs.length; i++ ) {
    //     a.push( divs[ i ].data('toggle') );
    //   }
    //   return a;
    // }

    $("body .js-devbar-toggle-all").click(function(e) {
      console.log('ALL devbar toggle');
      e.preventDefault();
      // let $allToggleClasses = $('.js-devbar-toggle').data('toggle');
      // var $all = $( ".js-devbar-toggle" );
      var $a = 'all';
      var $all = $( ".js-devbar-toggle" ).each(function( index ) {
        $a = $a + ' ' + $( this ).data('toggle');
      });
      // console.log('ALL devbar toggle' + $all);
      console.log($a);
      // console.log('devbar toggle' + $toggleClass);
      if($('body').hasClass('all')) {
        $('body').removeClass($a);
        $( ".js-devbar-toggle" ).removeClass('is-active');
      } else {
        $('body').addClass($a);
        $( ".js-devbar-toggle" ).addClass('is-active');
      }
      // $(this).toggleClass('is-active');
    });


    

    ////////////////////////////////
    // FADE IN ON SCROLL          //
    // GSAP SCROLLTRIGGER         //
    ////////////////////////////////

    // const fadeInElems = gsap.utils.toArray(
    //   '.main-content > *'
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


    ////////////////////////////////////////////////////////////////////////////
    // DESKTOP SCROLLBAR  SET VAR TO ALLOW HERO TO BE 100VW when SCROLLBAR    //
    ////////////////////////////////////////////////////////////////////////////

    let scroller = document.scrollingElement;

    // Force scrollbars to display
    // scroller.style.setProperty('overflow', 'scroll');

    // Wait for next from so scrollbars appear
    requestAnimationFrame(()=>{
      
      // True width of the viewport, minus scrollbars
      scroller.style
        .setProperty(
          '--vw', 
          scroller.clientWidth / 100
        );

      // Width of the scrollbar
      scroller.style
        .setProperty(
          '--scrollbar-width', 
          window.innerWidth - scroller.clientWidth + 'px'
        );

      // Reset overflow
      scroller.style
        .setProperty(
          'overflow', 
          ''
        );
    });


    ////////////////////////////////
    // ADD CLASS IF AT TOP        //
    // FOR LOGO ANIM (SIZE)       //
    ////////////////////////////////

    // if ($(window).scrollTop() == 0) {
    //   $('body').addClass('scroll-at-top-of-page');
    // }

    $(function(){
      // var $window = $(window);
      // var $body = $('body');
      // var top = $('.fixed_heading_shop').offset().top-85;

      $(window).scroll(function(){
        if( $(window).scrollTop() >= 80) {
          $('body').addClass('scroll-not-at-top-of-page');
        } else {
          $('body').removeClass('scroll-not-at-top-of-page');
        }   
      });
    });

    
    ///////////////////
    // SMOOTH SCROLL //
    ///////////////////

    // Select all links with hashes
    // $('a[href*="#"]')
    //   // Remove links that don't actually link to anything
    //   .not('[href="#"]')
    //   // .not('[href="#news"]') // added for news in overlay
    //   // .not('[href="#0"]')
    //   .click(function(event) {
    //     // On-page links
    //     if (
    //       location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
    //       && 
    //       location.hostname == this.hostname
    //     ) {
    //       // Figure out element to scroll to
    //       var target = $(this.hash);
    //       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    //       // Does a scroll target exist?
    //       if (target.length) {
    //         // Only prevent default if animation is actually gonna happen
    //         event.preventDefault();
    //         $('html, body').animate({
    //           scrollTop: (target.offset().top) - 80
    //         }, 1000, function() {
    //           // Callback after animation
    //           // Must change focus!
    //           var $target = $(target);
    //           $target.focus();
    //           if ($target.is(":focus")) { // Checking if the target was focused
    //             return false;
    //           } else {
    //             $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
    //             $target.focus(); // Set focus again
    //           };
    //         });
    //       }
    //     }
    //   });


    // OR...

    // el.scrollIntoView({
    //     behavior: 'smooth'
    // })
    



    ///////////////////
    // MAGNIFIC      //
    ///////////////////

    // $('.popup-with-form').magnificPopup({
    //     type: 'inline',
    //     preloader: false,
    //     focus: '#name',

    //     // When elemened is focused, some mobile browsers in some cases zoom in
    //     // It looks not nice, so we disable it:
    //     callbacks: {
    //       beforeOpen: function() {
    //         if($(window).width() < 700) {
    //           this.st.focus = false;
    //         } else {
    //           this.st.focus = '#name';
    //         }
    //       }
    //     }
    // });



    // /**************************************************************/
    // /***   WOW                                                  ***/
    // /**************************************************************/


    // var wow = new WOW(
    //   {
    //     // boxClass:     'wow',      // animated element css class (default is wow)
    //     // animateClass: 'animated', // animation css class (default is animated)
    //     // offset:       0,          // distance to the element when triggering the animation (default is 0)
    //     // mobile:       true,       // trigger animations on mobile devices (default is true)
    //     // live:         true,       // act on asynchronously loaded content (default is true)
    //     // callback:     function(box) {
    //     //   // the callback is fired every time an animation is started
    //     //   // the argument that is passed in is the DOM node being animated
    //     // },
    //     // scrollContainer: null,    // optional scroll container selector, otherwise use window,
    //     // resetAnimation: true,     // reset animation on end (default is true)
    //   }
    // );
    // wow.init();


    /////////////////////////////////
    // IFRAME LOAD ON CLICK VIDEO  //
    /////////////////////////////////
    
    // $('.js-iframe-load-on-click').click( function(event){
    //     event.preventDefault(); 
    //     // console.log('load iFrame'); 
    //     // $('.fs-option').removeClass('selected');
    //     // $('.fs-wrap').find('.fs-dropdown').removeClass('hidden');
    //     // $('.fs-wrap').addClass('fs-open');
    //     // deselect hidden fields
    //     var $url = $(this).data("src");
    //     $url = decodeURIComponent($url);
    //     $(this).html('<iframe id="iframe" src="'+$url+'" width="700" height="450"></iframe>');
    // });


};

$(document).ready(function() {

  ////////////////////
  /// SWUP ///////////
  ////////////////////

  // const pageTransitions = function() {
  // let pageTransitioning = false;
  // let animateInTimeline,
  //     animateOutTimeline,
  //     animateInNext;


  // // load scripts for replaced elements
  // document.addEventListener('swup:contentReplaced', event => {
  //   // swup.options.elements.forEach((selector) => {
  //       // load scripts for all elements with 'selector'
  //       // console.log( '%c contentReplaced ' + event.target.URL, 'background: #444; color: #888');
  //       // console.log($('body'));
  //       // scriptInit();
  //   // })
  //   // console.log(event);
  //   // console.log($('body'));
    
  //   setTimeout(function(){
  //     // console.log( '%c contentReplaced ' + event.target.URL, 'background: #444; color: #888');
  //     console.log($('body'));
  //     scriptInit();
  //   }, 1);
    
  // });

  // // document.addEventListener('swup:pageRetrievedFromCache', event => {
  // //   console.log( '%c pageRetrievedFromCache -> ' + event.target.URL, 'background: #222; color: #888');
  // //   scriptInit();
  // // });

  // let reverseLoad = () => {
  //     animateInNext && animateInNext();
  // }

  // let buildTimelineOut = (callback) => {
  //     let itemsToAnimate = $(".animate-out").toArray();
  //     itemsToAnimate.reverse();
  //     animateOutTimeline = new TimelineMax({ onComplete: callback });
  //     animateOutTimeline.to(itemsToAnimate, 0.3, { autoAlpha: 0 });
  // }

  // let buildTimelineIn = (callback) => {
  //     let itemsToAnimate = $(".animate-out").toArray();
  //     gsap.set(itemsToAnimate, { autoAlpha: 0 });
  //     animateInTimeline = new TimelineMax({ onComplete: callback, onReverseComplete: reverseLoad });
  //     animateInTimeline.to(itemsToAnimate, 0.3, { autoAlpha: 1 });
  // }

  // let options = {
  //   elements: ['#site-content', '#menu-main-menu'],
  //   // debugMode: true,
  //   preload: true,
  //   animateScroll: false,
  //   // pageClassPrefix: 'page-',
  //   animations: {
  //     // if link has data-swup-class="single-work"
  //     // '*>single-work': { 
  //     //   out: function(next) {
  //     //     console.log('%c ---->>>>>>> single work page baby', 'background: #bada55; color: #fff');
  //     //     // if (!pageTransitioning) {
  //     //     animateInNext = next;
  //     //     if (animateInTimeline && animateInTimeline.progress() < 1) {
  //     //       animateInTimeline.reverse();
  //     //     } else {
  //     //       if (!animateOutTimeline) {
  //     //         buildSingleWorkTimelineOut(next);
  //     //       }
  //     //       if (animateOutTimeline && !animateOutTimeline.isActive()) {
  //     //         buildSingleWorkTimelineOut(next);
  //     //       }
  //     //     }
  //     //   },
  //     //   in: function(next) {
  //     //     console.log(next);
  //     //     buildTimelineIn(next);
  //     //   }
  //     // },
  //     /// default transition
  //     '*': {
  //       out: function(next) {
  //         // if (!pageTransitioning) {
  //         animateInNext = next;
  //         if (animateInTimeline && animateInTimeline.progress() < 1) {
  //           animateInTimeline.reverse();
  //         } else {
  //           if (!animateOutTimeline) {
  //             buildTimelineOut(next);
  //           }
  //           if (animateOutTimeline && !animateOutTimeline.isActive()) {
  //             buildTimelineOut(next);
  //           }
  //         }
  //       },
  //       in: function(next) {
  //         console.log(next);
  //         buildTimelineIn(next);
  //       }
  //     }
  //   },
  //   LINK_SELECTOR: 'a[href^="/"]:not(.data-no-swup), a[href^="' + window.location.origin + '"]:not(.data-no-swup)'
  // }



  // let init = () => {
  //     var swup = new Swupjs(options);
  // }
  // return {
  //     init: init
  // }
  // }();

  ///////////////////
  // INIT SWUPS   ///
  ///////////////////
  // pageTransitions.init();


  ///////////////////
  // INIT SCRIPTS ///
  ///////////////////
  scriptInit();
  // alert('bosh');

});