<?php 

/**********************************************
 * Things to add to RAY
 **********************************************/

// replcaement for highway js. page transitions
// https://taxi.js.org/

// google fonts alternative
// https://www.fontshare.com/

// UTOPIA Type and site spacing
// https://utopia.fyi/type/calculator?c=320,21,1.2,1140,24,1.25,5,2,&s=0.75%7C0.5%7C0.25,1.5%7C2%7C3%7C4%7C6,s-l

// lazy loading 
// https://github.com/mfranzke/loading-attribute-polyfill

// CSS RESETS
// https://piccalil.li/blog/a-modern-css-reset/
// https://www.joshwcomeau.com/css/custom-css-reset/

// Animated Entrances
// https://css-tricks.com/a-handy-little-system-for-animated-entrances-in-css/

// FUNCTIONS FILE tips
// https://www.wpbeginner.com/wp-tutorials/25-extremely-useful-tricks-for-the-wordpress-functions-file/

// HTML Boilerplate
// https://www.matuzo.at/blog/html-boilerplate/

// image components
// https://web.dev/image-component/

// responisve images....
// first set new WP default image sizes
// then make all images, responsive - maybe ditch lazysizes, use something more progressive.
// featured images, bg images, picture elements, etc. -- all responsive.
// plus the images you add to WYSIWYG - make responive by default.

// use FILEMTIME for enqueue scripts version control so it looks to see if file has changed and if so, clears the cache for that file.
// filemtime( get_template_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path('app.css') )

// Smooth scrolling
// https://css-tricks.com/fixing-smooth-scrolling-with-find-on-page/

// Maximally optimizing image loading
// https://www.industrialempathy.com/posts/image-optimizations/

// CSS GRID
// https://css-tricks.com/using-css-grid-the-right-way/

// Placeholder for images
// https://plaiceholder.co/

// try out
// https://wordpress.org/plugins/wp-user-profiles/

// CUBE CSS
// https://piccalil.li/blog/cube-css/

// basic CSS
// https://github.com/hankchizljaw/some-nice-basic-css

// Colour vars in scss
// https://daverupert.com/2020/10/variable-layers/

// line height
// https://www.thegoodlineheight.com/

// TYPOGRAPHY
// simplify, check Optio connect setup.
// try https://moderncss.dev/generating-font-size-css-rules-and-creating-a-fluid-type-scale/
// https://css-tricks.com/how-to-tame-line-height-in-css/
// https://seek-oss.github.io/capsize/
// check how https://twitter.com/tailwindcss do font sizes

// CSS 
// https://moderncss.dev/

/// UTILITY CLASSES in CSS?
// https://twitter.com/argyleink/status/1316143837903896577

// worth trying?
// https://instant.page/wordpress

// STYLE LINTING
// https://stylelint.io/

// responsive images
// https://css-tricks.com/a-guide-to-the-responsive-images-syntax-in-html/

// optimise images
// https://www.keycdn.com/blog/optimize-images-for-web

// Boilerplate
// https://htmlcssjavascript.com/web/html5-boilerplate-8-0-0-released/

// UI system as a snippet
// https://www.sarasoueidan.com/blog/style-settings-with-css-variables/

// Optimse HTML - use HTML5 tags where currently not, get HTML size down.

// TRANSITIONS to TRY
// https://barba.js.org/docs/getstarted/intro/
// https://github.com/locomotivemtl/locomotive-scroll
// https://twitter.com/Highway_JS?s=09
// GSAP Scroll Plugin  <----- this one!
// instead of SWUPS
// https://highway.js.org/

// HEAD
// https://github.com/joshbuchea/head

// images
// https://ishadeed.com/article/image-techniques/
// https://moderncss.dev/ 

// CUSTOMISE WORDPRESS ADMIN LOGIN SCREEN - logo and image in bg.

// Flash of unstyled text
// https://greensock.com/fouc/

// JS techniques
// https://github.com/ryanmcdermott/clean-code-javascript#functions

// CSS AT SCALE
// https://hankchizljaw.com/wrote/keeping-it-simple-with-css-that-scales/
// https://hankchizljaw.com/styleguide/

// DATE PICKER
// https://github.com/duetds/date-picker

// TYPOGRAHY
// https://type-scale.com/?size=16&scale=1.500&text=Naming%20is%20hard&font=Playfair%20Display&fontweight=400&bodyfont=Poppins&bodyfontweight=400&lineheight=1.45&backgroundcolor=white&fontcolor=%23333&preview=false

// useful links
// nav clipped for diff coloured sections:
// https://codyhouse.co/tutorials/chameleonic-header-effect

// scroll header size the same.
// https://twitter.com/joshgkirk/status/1241899720269869056?s=09

// scroll to
// https://hiddedevries.nl/en/blog/2018-12-10-scroll-an-element-into-the-center-of-the-viewport?mc_cid=37b23db1b8&mc_eid=c33b05f197

// TO DO FIRST...
// set new image sizes on upload.

// selects
// https://css-tricks.com/striking-a-balance-between-native-and-custom-select-elements/

// 3D text
// https://bennettfeely.com/ztext/

// animated clip paths
// https://frontend.horse/articles/make-gifs-into-letters-with-clip-paths/

// readme github profile
// https://rahuldkjain.github.io/gh-profile-readme-generator/

// UMAMI Analyics
// https://umami.is/

// https://github.com/ChrisWiegman/chriswiegman-theme
// functions file - find some good stuff in here:

// /**
//  * Functions and filters for theme additions.
//  *
//  * @package chriswiegman-theme
//  */

// namespace CW\Theme;

// // Useful global constants.
// define( 'CW_THEME_VERSION', '9.3.3' );

// /**
//  * Setup theme hooks.
//  *
//  * @since 9.0.0
//  */
// function init() {

// 	$n = function ( $function ) {
// 		return __NAMESPACE__ . "\\$function";
// 	};

// 	// Add new actions and filters.
// 	add_action( 'after_setup_theme', $n( 'action_after_setup_theme' ) );
// 	add_action( 'widgets_init', $n( 'action_widgets_init' ) );
// 	add_action( 'wp_enqueue_scripts', $n( 'action_wp_enqueue_scripts' ) );
// 	add_filter( 'pre_get_posts', $n( 'filter_pre_get_posts' ) );
// 	add_filter( 'feed_links_show_comments_feed', __return_false() );
// 	add_filter( 'wp_resource_hints', $n( 'filter_wp_resource_hints' ), 10, 2 );
// 	add_action( 'admin_menu', $n( 'action_admin_menu' ) );
// 	add_action( 'init', $n( 'action_init' ), 100 );
// 	add_action( 'wp_before_admin_bar_render', $n( 'action_wp_before_admin_bar_render' ) );

// 	// Cleanup extra garbage.
// 	if ( function_exists( 'remove_action' ) ) {

// 		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// 		remove_action( 'wp_print_styles', 'print_emoji_styles' );
// 		remove_action( 'wp_head', 'rsd_link' );
// 		remove_action( 'wp_head', 'wlwmanifest_link' );
// 		remove_action( 'wp_head', 'wp_generator' );
// 		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
// 		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
// 		remove_action( 'wp_head', 'rest_output_link_wp_head' );

// 	}
// }

// /**
//  * Removes comments from the admin bar
//  *
//  * @since 9.3.3
//  */
// function action_wp_before_admin_bar_render() {

// 	global $wp_admin_bar;

// 	$wp_admin_bar->remove_menu( 'comments' );

// }

// /**
//  * Removes comments from the admin menu
//  *
//  * @since 9.3.3
//  */
// function action_admin_menu() {

// 	remove_menu_page( 'edit-comments.php' );

// }

// /**
//  * Remove support for comments
//  *
//  * @since 9.3.3
//  */
// function action_init() {

// 	remove_post_type_support( 'post', 'comments' );
// 	remove_post_type_support( 'page', 'comments' );

// }

// /**
//  * Filter wp_resource hints
//  *
//  * Remove extra DNS prefecth links.
//  *
//  * @param array  $urls          URLs to print for resource hints.
//  * @param string $relation_type The relation type the URLs are printed for, e.g. 'preconnect' or 'prerender'.
//  *
//  * @return array
//  */
// function filter_wp_resource_hints( $urls, $relation_type ) {

// 	if ( 'dns-prefetch' !== $relation_type ) {
// 		return $urls;
// 	}

// 	unset( $urls[1] );

// 	return $urls;
// }

// /**
//  * Action after_theme_setup
//  *
//  * Sets up theme defaults and registers support for various WordPress features.
//  *
//  * @since 9.0.0
//  */
// function action_after_setup_theme() {

// 	// Add default posts and comments RSS feed links to head.
// 	add_theme_support( 'automatic-feed-links' );

// 	// Enable support for Post Thumbnails on posts and pages.
// 	add_theme_support( 'post-thumbnails' );

// 	// Enable Appropriate styles in the editor.
// 	add_theme_support( 'editor-styles' );
// 	add_editor_style( 'assets/editor.css' );

// 	// Add theme support for the title tag.
// 	add_theme_support( 'title-tag' );

// 	// This theme uses wp_nav_menu() in one location.
// 	register_nav_menus(
// 		array(
// 			'primary' => 'Primary Menu',
// 			'footer'  => 'Footer Menu',
// 		)
// 	);

// }

// /**
//  * Action widgets_init
//  *
//  * Register widget area.
//  *
//  * @since 9.0.0
//  */
// function action_widgets_init() {

// 	register_sidebar(
// 		array(
// 			'name'          => 'Homepage Intro',
// 			'id'            => 'home-intro',
// 			'description'   => 'The intro section for the homepage',
// 			'before_widget' => '',
// 			'after_widget'  => '',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);

// 	register_sidebar(
// 		array(
// 			'name'          => 'Journal Intro',
// 			'id'            => 'journal-intro',
// 			'description'   => 'The intro section for the journal page',
// 			'before_widget' => '',
// 			'after_widget'  => '',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);

// }


// /**
//  * Action wp_enqueue_scripts
//  *
//  * Enqueue scripts and styles.
//  *
//  * @since 9.0.0
//  */
// function action_wp_enqueue_scripts() {

// 	$min     = '.min';
// 	$version = CW_THEME_VERSION;

// 	if ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) {

// 		$min     = '';
// 		$version = time();

// 	}

// 	wp_deregister_script( 'wp-embed' );
// 	wp_dequeue_style( 'wp-block-library' );
// 	wp_enqueue_style( 'cw-theme-style', get_template_directory_uri() . '/assets/main' . $min . '.css', array(), $version );

// }

// /**
//  * Exclude Journal from homepage
//  *
//  * @since 9.1.0
//  *
//  * @param WP_Query $query The posts query to filter.
//  */
// function filter_pre_get_posts( $query ) {

// 	if ( $query->is_home || ( $query->is_feed && ! $query->is_category ) ) {
// 		$query->set( 'cat', '-106' ); // Remove "Journal" posts.
// 	}

// 	return $query;

// }

// init();

