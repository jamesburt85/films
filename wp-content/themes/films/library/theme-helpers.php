<?php

/**
 * Theme Helpers
 * ----------------------------------------------------------------------------
 */

/**
 * stop WP reducing jpg quality 
 * ----------------------------------------------------------------------------
 */


// image quality...
add_filter('jpeg_quality', function($arg){return 100;});




// remove welcome message
remove_action('welcome_panel', 'wp_welcome_panel');




// Default image size when adding image to WYSIWYG

function custom_image_size() {
    // Set default values for the upload media box
    update_option('image_default_align', 'center' );
    update_option('image_default_size', 'fp-large' );

}
add_action('after_setup_theme', 'custom_image_size');


/**
 * CLEAN UP JAVASCRIPT AND CSS ATTRIBUTE TAGS
 * ----------------------------------------------------------------------------
 */


// add_filter( 'style_loader_tag',  'clean_style_tag'  );
// add_filter( 'script_loader_tag', 'clean_script_tag'  );

// /**
//  * Clean up output of stylesheet <link> tags
//  */
// function clean_style_tag( $input ) {
//     preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );
//     if ( empty( $matches[2] ) ) {
//         return $input;
//     }
//     // Only display media if it is meaningful
//     $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';

//     return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
// }

/**
 * Clean up output of <script> tags
 */
function clean_script_tag( $input ) {
    $input = str_replace( "type='text/javascript' ", '', $input );

    return str_replace( "'", '"', $input );
}


/**
 * Move Yoast to Bottom
 * ----------------------------------------------------------------------------
 */


// function yoasttobottom() {
// 	return 'low';
// }
// 	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');



/**
 * Update admin Footer
 * ----------------------------------------------------------------------------
 */

function remove_footer_admin () {
	echo 'Powered by <a href="http://a-d.digital" target="_blank">a-d.digital</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/**
 * ZAPP Widget in Admin
 * ----------------------------------------------------------------------------
 */

// // Function that outputs the contents of the dashboard widget
// function dashboard_widget_function( $post, $callback_args ) {
// 	echo '<a href="http://zapp.digital" target="_blank"><img style="width:100%;" src="'.get_template_directory_uri ().'/screenshot.png"/></a><br/>Welcome to your website!<br/>Please contact <a href="mailto:admin@zapp.digital">support</a> if you have any problems.';
// }
// // Function used in the action hook
// function add_dashboard_widgets() {
// 	wp_add_dashboard_widget('dashboard_widget', 'A ZAPP Theme', 'dashboard_widget_function');
// }
// // Register the new dashboard widget with the 'wp_dashboard_setup' action
// add_action('wp_dashboard_setup', 'add_dashboard_widgets' );



/**
 * Remove Widgets from in Admin
 * ----------------------------------------------------------------------------
 */
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	update_user_meta( get_current_user_id(), 'show_welcome_panel', false );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

