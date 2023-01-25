//Offside.js minimal setup
var myOffside = offside( '#off-canvas-menu', {

    slidingElementsSelector:'#site-content-container',
    buttonsSelector: '.js-off-canvas-menu-button, .js-site-overlay',

    // all options
    // // Global offside options: affect all offside instances
    // slidingElementsSelector: '#my-content-container', // String: Sliding elements selectors ('#foo, #bar')
    // disableCss3dTransforms: false,                    // Disable CSS 3d Transforms support (for testing purposes)
    // debug: true,                                      // Boolean: If true, print errors in console

    // // Offside instance options: affect only this offside instance
    // buttonsSelector: '#my-button, .another-button',   // String: Offside toggle buttons selectors ('#foo, #bar')
    // slidingSide: 'right',                             // String: Offside element pushed on left or right
    // init: function(){},                               // Function: After init callback
    beforeOpen: function(){
     $('.js-hamburger').addClass('is-active');
    },                         // Function: Before open callback
    // afterOpen: function(){},                          // Function: After open callback
    // beforeClose: function(){
        // $('.js-hamburger').removeClass('is-active');
    // },                        // Function: Before close callback
    afterClose: function(){
        $('.js-hamburger').removeClass('is-active');
    },    // Function: After close callback   

});