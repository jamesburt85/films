<?php
/**
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 *
**/

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Add theme support */ 
require_once( 'library/theme-helpers.php' );

/** Register all navigation menus */
require_once( 'library/nav/navigation--menu-walker.php' );
require_once( 'library/nav/navigation.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

// Custom Post Types
require_once( 'library/custom-post-types.php' );

// Youtube / Vimeo 
require_once( 'library/vimeo-youtube-functions.php' );

// General Functions that don't go anywhere else
require_once( 'library/theme-functions.php' );

// Style Login page
require_once( 'library/login-styling.php' );

// Admin Styling
require_once( 'library/admin-styling.php' );

// Debugging
require_once( 'library/debugging.php' );

// Get Related Posts
// require_once( 'library/get-related-posts.php' );

// Pre Get Posts - fundamentally change the loop 
// require_once( 'library/pre-get-posts.php' );


/////////////
// PLUGINS //
/////////////

// Advanced Custom Fields Helper Functions
require_once( 'library/plugins/acf-helpers.php' );
// Yoast
require_once( 'library/plugins/yoast-helpers.php' );

// Gutenberg. - load in Blocks
require_once( 'template-parts/blocks/blocks.php' );

// acf-gravity_forms
// require_once( 'library/plugins/acf-grav-forms/acf-gravity_forms.php' );

// Grav Forms
// require_once( 'library/plugins/gravity-forms-helpers.php' );



/**
 * Change all YT embeds to be nocookie URLs
 */

add_filter( 'embed_oembed_html', 'adstyles_embed_oembed_html', 99, 4 );

function adstyles_embed_oembed_html( $html ) {

    if (preg_match('/(youtube.com)/', $html)) {
        return str_replace('youtube.com', 'youtube-nocookie.com', $html);
    } elseif (preg_match('/(youtu.be)/', $html)) {
        return str_replace('youtu.be', 'youtube-nocookie.com/watch?v=', $html);
    } else {
        return $html;
    }

}


/****************************************************
 * Adding a DIV wrapper to Gutenberg’s Classic blocks
 ****************************************************/



add_filter( 'render_block', 'wrap_paragraph_block', 10, 2 );

function wrap_paragraph_block( $block_content, $block ) {

    $classicBlocks = [
        'core/paragraph',
        'core/block',
        'core/button',
        'core/embed',
        'core/freeform',
        'core/gallery',
        'core/heading',
        'core/html',
        // 'core/image',
        'core/list',
        'core/paragraph',
        'core/preformatted',
        'core/pullquote',
        'core/quote',
        'yoast/faq-block'
    ];

    // echo '<pre>';
    // print_r($block['blockName']);
    // echo '</pre>';

    // $result = in_array($block['blockName'], $classicBlocks);
    // var_dump($result);

  if ( in_array($block['blockName'], $classicBlocks) ) {
    // echo "<h1>IS IN ARRAY</h1>";
    $block_content = '<div class="wrapper">' . $block_content . '</div>';
  }

  return $block_content;

}



/**
 * Enqueue block JavaScript and CSS for the gutenberg editor
 */
function my_block_plugin_editor_scripts() {
    
    // // Enqueue block editor JS
    // wp_enqueue_script(
    //     'my-block-editor-js',
    //     plugins_url( '/blocks/custom-block/index.js', __FILE__ ),
    //     [ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ],
    //     filemtime( plugin_dir_path( __FILE__ ) . 'blocks/custom-block/index.js' )   
    // );

    // Enqueue block editor styles
    wp_enqueue_style(
        'my-block-editor-css',
        get_stylesheet_directory_uri() . '/dist/css/style.css',
        // plugins_url( '/blocks/custom-block/editor-styles.css', __FILE__ ),
        [ 'wp-edit-blocks' ],
        filemtime( get_stylesheet_directory_uri() . '/dist/css/style.css' )  
    );

}

// Hook the enqueue functions into the editor
add_action( 'enqueue_block_editor_assets', 'my_block_plugin_editor_scripts' );



// SET NUM OF POSTS TO DISPLAY, ACCORDING TO POST TYPE

function num_posts_in_archive($query) {
    if (!is_admin() && $query->is_archive('service_cpt') && $query->is_main_query()) {
            $query->set('posts_per_page', 99);
   }
    return $query;
}

add_filter('pre_get_posts', 'num_posts_in_archive');


// function my_query_post_type($query) {
//     if ( is_category('factual') && ( ! isset( $query->query_vars['suppress_filters'] ) || false == $query->query_vars['suppress_filters'] ) ) {
//         $query->set( 'post_type', array( 'post', 'work' ) );
//         return $query;
//     }
// }
// add_filter('pre_get_posts', 'my_query_post_type');

