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
// add_filter( 'render_block', 'wrap_paragraph_block', 10, 2 );

// function wrap_paragraph_block( $block_content, $block ) {

//     $classicBlocks = [
//         'core/paragraph',
//         'core/block',
//         'core/button',
//         'core/embed',
//         'core/freeform',
//         'core/gallery',
//         'core/heading',
//         'core/html',
//         // 'core/image',
//         'core/list',
//         'core/paragraph',
//         'core/preformatted',
//         'core/pullquote',
//         'core/quote',
//         'yoast/faq-block'
//     ];

//     // echo '<pre>';
//     // print_r($block['blockName']);
//     // echo '</pre>';

//     // $result = in_array($block['blockName'], $classicBlocks);
//     // var_dump($result);

//   if ( in_array($block['blockName'], $classicBlocks) ) {
//     // echo "<h1>IS IN ARRAY</h1>";
//     $block_content = '<div class="wrapper">' . $block_content . '</div>';
//   }

//   return $block_content;

// }



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
        // filemtime( get_stylesheet_directory_uri() . '/dist/css/style.css' )  
        '1.05.00' 
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
    // if (!is_admin() && $query->is_archive('kit') && $query->is_main_query()) {
    if (!is_admin() && $query->is_post_type_archive('kit') ) {
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


// Add highlight to nav items when on CPT Archives and Single
function add_current_nav_class($classes, $item) {

   // Getting the current post details
   global $post;

   // Get post ID, if nothing found set to NULL
   $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

   // Checking if post ID exist...
   if (isset( $id )){

       // Getting the post type of the current post
       $current_post_type = get_post_type_object(get_post_type($post->ID));

       // Getting the rewrite slug containing the post type's ancestors
       $ancestor_slug = $current_post_type->rewrite ? $current_post_type->rewrite['slug'] : '';

       // Split the slug into an array of ancestors and then slice off the direct parent.
       $ancestors = explode('/',$ancestor_slug);
       $parent = array_pop($ancestors);

       // Getting the URL of the menu item
       $menu_slug = strtolower(trim($item->url));

       // Remove domain from menu slug
       $menu_slug = str_replace($_SERVER['SERVER_NAME'], "", $menu_slug);

       // If the menu item URL contains the post type's parent
       if (!empty($menu_slug) && !is_search() && !empty($parent) && strpos($menu_slug,$parent) !== false) {
           $classes[] = 'current-menu-item';
       }
       
       // If the menu item URL contains any of the post type's ancestors
       foreach ( $ancestors as $ancestor ) {
           if (!empty($menu_slug) && !empty($ancestor) && strpos($menu_slug,$ancestor) !== false) {
               $classes[] = 'current-page-ancestor';
           }
       }
   }
   // Return the corrected set of classes to be added to the menu item
   return $classes;

}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );

// Add active class to CPT Archive link when viewing Taxonomy pages
function add_active_class_to_cpt_archive_nav_item($classes, $item) {
    // Check if the current page is a CPT taxonomy page
    if (is_tax() && !is_search() && in_array('menu-item', $classes)) {
        // Get the taxonomy object for the current term
        $term = get_queried_object();
        
        // Check if the term is associated with a CPT
        if ($term && isset($term->taxonomy)) {
            $taxonomy = $term->taxonomy;
            $post_type = get_taxonomy($taxonomy)->object_type[0];
            
            // Check if the menu item links to the CPT archive
            if ($item->url === get_post_type_archive_link($post_type)) {
                $classes[] = 'current-menu-item'; // Add the active class
            }
        }
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'add_active_class_to_cpt_archive_nav_item', 10, 2);


// function exclude_featured_post( $query ) {
//     if ( is_front_page() && $query->is_main_query() ) {


//         $meta_query = $query->get('meta_query') ? $query->get('meta_query') : array();

//         // append yours
//         $meta_query[] = array(
//             'key' => 'active_case_study', // please make sure that key is correct
//             'value' => '1',
//             'compare' => '!=' // you can also try 'NOT EXISTS' comparison
//         );

//         $query->set('meta_query', $meta_query);

//     }
// }
// add_action( 'pre_get_posts', 'exclude_featured_post' );