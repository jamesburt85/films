// TESTING JQUERY
// import "./lib/import-jquery.js";

// import 'babel-polyfill'

// import("jquery").then(async (jquery) => {
//     $ = window.$ = window.jQuery = jquery
//     $(document).ready(function() {
//       console.log('hello')
//     })
// })

////////////////////////////////////////



// GSAP
// import { gsap, Power4, Linear } from 'gsap';
// import { CustomEase } from 'gsap/CustomEase';
// import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

const jquery = require('jquery');

$ = window.$ = window.jQuery = jquery;

$(document).ready(() => {
  console.log("hello dddddd");
});

// IMPORT APP
import './app.js';

