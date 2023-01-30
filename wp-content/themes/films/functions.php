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
require_once( 'library/nav/menu-walkers.php' );

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

// SET NUM OF POSTS TO DISPLAY, ACCORDING TO POST TYPE

function num_kit_posts_in_archive($query) {
    if (!is_admin() && $query->is_archive('kit') && $query->is_main_query()) {
            $query->set('posts_per_page', 12);
   }
    return $query;
}

add_filter('pre_get_posts', 'num_kit_posts_in_archive');


// function my_query_post_type($query) {
//     if ( is_category('factual') && ( ! isset( $query->query_vars['suppress_filters'] ) || false == $query->query_vars['suppress_filters'] ) ) {
//         $query->set( 'post_type', array( 'post', 'work' ) );
//         return $query;
//     }
// }
// add_filter('pre_get_posts', 'my_query_post_type');




// services list in sidebar

// class Clean_Walker extends Walker_Page {
//     function start_lvl(&$output, $depth) {
//         $indent = str_repeat("\t", $depth);
//         $output .= "\n$indent<ul>\n";
//     }

//     function start_el(&$output, $page, $depth, $args, $current_page) {
//         if ( $depth )
//             $indent = str_repeat("\t", $depth);
//         else
//             $indent = '';
//         extract($args, EXTR_SKIP);
//         $class_attr = '';
//         if ( !empty($current_page) ) {
//             $_current_page = get_page( $current_page );
//             if ( (isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors)) || ( $page->ID == $current_page ) || ( $_current_page && $page->ID == $_current_page->post_parent ) ) {
//                 $class_attr = 'sel';
//             }
//         } elseif ( (is_single() || is_archive()) && ($page->ID == get_option('page_for_posts')) ) {
//             $class_attr = 'sel';
//         }
//         if ( $class_attr != '' ) {
//             $class_attr = ' class="' . $class_attr . '"';
//             $link_before .= '<strong>';
//             $link_after = '</strong>' . $link_after;
//         }
//         $output .= $indent . '<li' . $class_attr . '><a href="' . make_href_root_relative(get_page_link($page->ID)) . '"' . $class_attr . '>' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

//         if ( !empty($show_date) ) {
//             if ( 'modified' == $show_date )
//                 $time = $page->post_modified;
//             else
//                 $time = $page->post_date;
//             $output .= " " . mysql2date($date_format, $time);
//         }
//     }
// }

function clean_wp_list_pages($menu) {
    // echo "<pre>";
    // print_r($menu);
    // echo "</pre>";
    // Remove redundant title attributes
    // $menu = remove_title_attributes($menu);
    // Remove protocol and domain name from href values
    // $menu = make_href_root_relative($menu);
    // Give the list items containing the current item or one of its ancestors a class name
    // $menu = preg_replace('/class="(.*?)current_page(.*?)"/','class="sel"',$menu);
    // Remove all other class names
    // $menu = preg_replace('/ class=(["\'])(?!sel).*?\1/','',$menu);
    // Give the current link and the links to its ancestors a class name and wrap their content in a strong element
    // $count = 0;

    // $siteUrl = get_site_url();
    // echo "<pre>";
    // print_r($siteUrl);
    // echo "</pre>";

    // replace url with #anchor///
    // $menu = preg_replace('/href="(http:\/\/)?([^"]+)"/', "href=\"http://google.com/\\2\"", $menu);
    // $menu = preg_replace('/href="('.$siteUrl.'\/\/)?([^"]+)"/', "href=\"http://google.com/\\2\"", $menu);


    $menu = preg_replace('/<a(.*?)>(.*?)<\/a>/','<a href="#" class="sel"><strong>$2</strong></a>',$menu);

    // $menu = preg_replace('<a(.*?)>','<a href="">',$menu);


    return $menu;
}
add_filter( 'wp_list_pages', 'clean_wp_list_pages' );