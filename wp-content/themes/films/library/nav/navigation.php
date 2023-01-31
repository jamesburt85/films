<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(
	array(
		'primary-nav'  => esc_html__( 'Primary Nav', 'foundationpress' ),
		'secondary-nav'  => esc_html__( 'Secondary Nav', 'foundationpress' ),
		'off-canvas' => esc_html__( 'Off Canvas', 'foundationpress' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'foundationpress' ),
	)
);


/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'ray_primary_nav' ) ) {
	function ray_primary_nav() {
		wp_nav_menu(	
			array(
				'container'      => false,
				'menu_class'     => 'menu primary-nav',
				'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu">%3$s</ul>',
				'theme_location' => 'primary-nav',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Ray_Nav_Walker(),
			)
		);
	}
}

/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'ray_secondary_nav' ) ) {
	function ray_secondary_nav() {
		wp_nav_menu(	
			array(
				'container'      => false,
				'menu_class'     => 'menu secondary-nav',
				'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu">%3$s</ul>',
				'theme_location' => 'secondary-nav',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Ray_Nav_Walker(),
			)
		);
	}
}


/**
 * off-canvas navigation - topbar (default) or offcanvas
 */
if ( ! function_exists( 'ray_off_canvas' ) ) {
	function ray_off_canvas() {
		wp_nav_menu(
			array(
				'container'      => false,                         // Remove nav container
				'menu'           => __( 'off-canvas-nav', 'foundationpress' ),
				'menu_class'     => 'off-canvas-menu vertical menu',
				'theme_location' => 'off-canvas',
				// 'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new Ray_Nav_Walker(),
			)
		);
	}
}

/**
 * off-canvas navigation - topbar (default) or offcanvas
 */
if ( ! function_exists( 'ray_footer_menu' ) ) {
	function ray_footer_menu() {
		wp_nav_menu(
			array(
				'container'      => false,                         // Remove nav container
				'menu'           => __( 'footer-menu-nav', 'foundationpress' ),
				'menu_class'     => 'footer-menu vertical menu',
				'theme_location' => 'footer-menu',
				// 'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new Ray_Nav_Walker(),
			)
		);
	}
}



/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
// if ( ! function_exists( 'foundationpress_add_menuclass' ) ) {
// 	function foundationpress_add_menuclass( $ulclass ) {
// 		$find    = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
// 		$replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

// 		return preg_replace( $find, $replace, $ulclass, 1 );
// 	}
// 	add_filter( 'wp_nav_menu', 'foundationpress_add_menuclass' );
// }



/**********************************************
 * This filter highlights CPT in main nav menu
 **********************************************/

// Active highlighting
// ----------------------------------------
function custom_menu_item_classes($classes = array(), $menu_item = false){

    if( (is_singular('work') || is_category('work_category') || is_post_type_archive('work')) && $menu_item->ID == 5566 ) { // is_tax( 'industry' ) || 
        $classes[] = 'current-menu-item current_page_item active';
    }
   
    if( (is_singular('kit') || is_category('kit_category') || is_post_type_archive('kit')) && $menu_item->ID == 5565 ) { // is_tax( 'industry' ) || 
        $classes[] = 'current-menu-item current_page_item active';
    }

    if( (is_singular('people') || is_category('people_category') || is_post_type_archive('people')) && $menu_item->ID == 23 ) { // is_tax( 'industry' ) || 
        $classes[] = 'current-menu-item current_page_item active';
    }


    return $classes;
}

add_filter( 'nav_menu_css_class', 'custom_menu_item_classes', 10, 2 );


