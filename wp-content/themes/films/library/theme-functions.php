<?php 
/*
** A home for all theme specific functions that don't belong elsewhere
*/


# Function to return related posts 
function wiaw_get_related_posts( $post = null, $num_posts = 2) {

    # Die early if no post
    if( empty( $post)) return false;

    # Get the post terms
    $terms = get_the_terms( $post->ID, 'category' );
    # Use WP's badass funtion to return an array of slugs
    $term_list = wp_list_pluck( $terms, 'slug' );
    # Build the query args
    $related_args = array(
        'post_type' => $post->post_type,
        'posts_per_page' => $num_posts,
        'post_status' => 'publish',
        'post__not_in' => array( $post->ID ),
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $term_list
            ),
        ),
    );

    $related_posts = get_posts( $related_args);

    if ( !empty( $related_posts)) {
        return $related_posts;
    } else {
        return false;
    }
}

// EXAMPLE USE:
// $related_content = wiaw_get_related_posts( $post, 1);
// if ( !empty( $related_content)) {
//     foreach ($related_content as $post) {
//         setup_postdata( $post);
//         require( locate_template( 'template-parts/content-'.$post->post_type.'.php' ) );
//     }
//     wp_reset_postdata();
// }



/**********************************************
* remove all Post Types
 **********************************************/

function ray_remove_post_formats() {
    remove_theme_support('post-formats');
    // add_theme_support( 'post-formats', array( 'link', 'audio', 'status' ) );
}
add_action( 'after_setup_theme', 'ray_remove_post_formats', 11 );





// //disable gutenburg
// add_filter('use_block_editor_for_post', '__return_false');
// // Fully Disable Gutenberg editor.
// add_filter('use_block_editor_for_post_type', '__return_false', 10);
// // Don't load Gutenberg-related stylesheets.
// add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
// function remove_block_css() {
//  wp_dequeue_style( 'wp-block-library' ); // WordPress core
//  wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
//  wp_dequeue_style( 'wc-block-style' ); // WooCommerce
//  wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
// }




# Parsing videos for embed
function parse_yturl($url) {
    $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    preg_match($pattern, $url, $matches);
    return (isset($matches[1])) ? $matches[1] : false;
}
function getYouTubeIdFromURL($url) {
  $pattern = '/(?:youtube.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu.be/)([^"&?/ ]{11})/i';
  preg_match($pattern, $url, $matches);

  return isset($matches[1]) ? $matches[1] : false;
}
function wiaw_get_video_provider($url) {
    if (strpos($url, 'youtu') > 0) {
        return 'youtube';
    } elseif (strpos($url, 'vimeo') > 0) {
        return 'vimeo';
    } else {
        return 'unknown';
    }
}
function getVimeoVideoIdFromUrl($url = '') {
    $regs = array();
    $id = '';
    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
        $id = $regs[3];
    }
    return $id;
}
function wiaw_get_vimeo_thumbnail($url, $size='medium') {
    $id = getVimeoVideoIdFromUrl( $url);
    $vimeo = unserialize( file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
    return $vimeo[0]['thumbnail_'.$size];
}



# Wrap embeds with responsive wrapper
function my_embed_oembed_html($html, $url, $attr, $post_id) {

    if ( strpos($url, 'vimeo') || strpos($url, 'youtu')) {
        return '<div class="video-embed"><div class="embed-container">' . $html . '</div></div>';
    } else {
        return $html;
    }
}
// add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);



# REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
