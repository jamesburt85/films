<?php 

/**
 * Theme Setup - On Activation
 * ----------------------------------------------------------------------------
 */

# Make Home and set as homepage
if ( ! function_exists( 'thunderstruck_create_pages_on_activation' ) ) :
function thunderstruck_create_pages_on_activation() {

	// # set all pages to draft
	// $all_pages = get_posts( 
	// 	array(
	// 		'post_type' => 'page',
	// 		'posts_per_page' => -1
	// 	)
	// );

	// foreach ($all_pages as $page) {
	// 	$args = array( 'ID' => $page->ID, 'post_status' => 'draft' );
	// 	wp_update_post($args);
	// }

	
	# If the front page is posts
	$show_on_front = get_option('show_on_front');
	if ( $show_on_front == 'posts') {

		# Change the "show on front" setting to page
		update_option( 'show_on_front', 'page');

	}

	# Check if a page called "home" exists
	$page_called_home = get_page_by_title( __('Home', 'whoisandywhite'));
	if ( !empty( $page_called_home)) {
		$page_called_home = $page_called_home->ID;
	}

	# If it doesn't; create it
	if ( empty($page_called_home)) {
		$page = array(
				'post_title' =>  __('Home', 'whoisandywhite'),
				'post_type' => 'page',
				'post_status' => 'publish',
				'post_content' => '',
				// 'page_template' => ''
			);
		$page_called_home = wp_insert_post($page); // returns ID
	} else {
		$args = array( 'ID' => $page_called_home, 'post_status' => 'publish' );
		wp_update_post($args);
	}

	# Set the page called "home" to the front page
	update_option( 'page_on_front', $page_called_home);

}
endif;


# Create main menu 
function wiaw_create_main_menu_on_activation(){

	# Check if the menu exists
	$menu_name = 'Main Menu';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	# If it doesn't exist, let's create it.
	if( !$menu_exists){

	    $menu_id = wp_create_nav_menu($menu_name);

		# Set up home menu item
	    $home_page_menu_id = wp_update_nav_menu_item( $menu_id, 0, array(
		        'menu-item-title' =>  __('Home'),
		        'menu-item-classes' => 'home',
		        'menu-item-url' => home_url( '/' ), 
		        'menu-item-status' => 'publish'
	        )
	    );

	} else {

		$menu_id = $menu_exists->term_id;

	}

	# Set the menus as the main-menu
	wiaw_set_menu_location( $menu_id, 'top-bar-r');
	wiaw_set_menu_location( $menu_id, 'mobile-nav');
}

# Set menu location
function wiaw_set_menu_location( $menu_id = '', $menu_location = ''){

	if( empty($menu_id) || empty( $menu_location))
		return;

	# Get registered menu locations
	$locations = get_theme_mod( 'nav_menu_locations' );

	if(!empty($locations)) # Locations are already set
	{

		$menu_found = false;

		# Loop through locations
	    foreach($locations as $location_id => $menu_value) 
	    {
	    	# when we find the menu we want to update
	    	if ( $menu_location == $location_id) {

	    		$menu_found = true;

	    		# Over-write the entry in the array
	    		$locations[$location_id] = $menu_id;
	    	}
	    }

	    # If we didn't find the menu we wanted in the array, add it
	    if ( !$menu_found) {
	    	$locations[$menu_location] = $menu_id;
	    }

	} else { # No locations are set

		$locations = array();
		$locations[$menu_location] = $menu_id;
	}

	# update the nav_menu_locations with the new $locations
	set_theme_mod('nav_menu_locations', $locations);

}



# Theme Setup
function wiaw_theme_setup(){

	# Create required pages
	thunderstruck_create_pages_on_activation();

	# Create Nav
	wiaw_create_main_menu_on_activation();
}

wiaw_theme_setup();