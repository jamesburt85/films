<?php



if ( ! function_exists( 'raygun_scripts' ) ) :
	function raygun_scripts() {

		$versionNum 	= '1.05.00';
		// $versionNum 	= mt_rand(1000,9999);
		$scriptsFolder 	= get_stylesheet_directory_uri() . '/dist/';

		// adding Jquery in main.js instead
		wp_deregister_script( 'jquery' );

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet',
			$scriptsFolder . 'css/style.css',
			array(),
			$versionNum
		);

		wp_register_script( 'raygun',
			$scriptsFolder . '/js/main.js',
			array(), // array( 'jquery' );
			$versionNum,
			true
		);

		// Localize the script with new data
	 	$theme_js_data = array(
			'themeurl' => get_template_directory_uri(),
			'ajaxurl' => admin_url('admin-ajax.php'),
			'blogurl' => get_bloginfo('url')
	 	);
	 	wp_localize_script( 'raygun', 'js_vars', $theme_js_data );
		
		wp_enqueue_script( 'raygun' );

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'raygun_scripts' );
endif;
	
			//'collapse_width' => 767,
	// wp_enqueue_style( 'main-stylesheet', $scriptsFolder . 'main.css', array(), $versionNum);
		// wp_deregister_script( 'jquery' );

		// wp_enqueue_script( 'jquery', 				$scriptsFolder . 'js/lib/jquery-3.6.0.min.js', 			array(), '1', true );
		// wp_enqueue_script( 'gsap', 					$scriptsFolder . 'js/lib/gsap.min.js', 					array('jquery'), '1', true );
		// wp_enqueue_script( 'ScrollTrigger', 		$scriptsFolder . 'js/lib/ScrollTrigger.min.js', 		array('jquery'), '1', true );
		// wp_enqueue_script( 'magnific', 				$scriptsFolder . 'js/lib/jquery.magnific-popup.min.js', array('jquery'), '1', true );
		// wp_enqueue_script( 'lazysizes', 			$scriptsFolder . 'js/lib/lazysizes.min.js', 			array(), '1', true );


		// if(constant("LIVEMODE"))
		// {
		// 	wp_register_script( 'raygun', get_stylesheet_directory_uri() . '/assets/js/app.min.js', null, $versionNum, true );
		// }
		// else
		// {
		// wp_enqueue_script( 'jquery', 				$scriptsFolder . 'js/lib/jquery-2.2.1.min.js', 			array(), '1', true );
		// wp_enqueue_script( 'swup', 				$scriptsFolder . 'js/lib/swupjs.min.js', 				array('jquery'), '1', true );
		// wp_enqueue_script( 'tweenmax', 			$scriptsFolder . 'js/lib/TweenMax.min.js', 				array('jquery'), '1', true );
		// wp_enqueue_script( 'gsapDevTools', 		$scriptsFolder . 'js/lib/gsap/GSDevTools.min.js', 		array('jquery'), '1', true );
		// wp_enqueue_script( 'DrawSVGPlugin', 		$scriptsFolder . 'js/lib/gsap/DrawSVGPlugin.min.js', 	array('jquery'), '1', true );
		// wp_enqueue_script( 'MorphSVGPlugin', 	$scriptsFolder . 'js/lib/gsap/MorphSVGPlugin.min.js', 	array('jquery'), '1', true );
		// wp_enqueue_script( 'ScrollToPlugin', 	$scriptsFolder . 'js/lib/gsap/ScrollToPlugin.min.js', 	array('jquery'), '1', true );
		// wp_enqueue_script( 'waypoints', 			$scriptsFolder . 'js/lib/jquery.waypoints.js', 			array('jquery'), '1', true );
		// wp_enqueue_script( 'waypoints-debug', 	$scriptsFolder . 'js/lib/waypoints.debug.js', 			array('jquery'), '1', true );
		// wp_enqueue_script( 'slick', 				$scriptsFolder . 'js/lib/slick.min.js', 				array('jquery'), '1', true );
		// wp_enqueue_script( 'wow', 				$scriptsFolder . 'js/lib/wow.min.js', 					array('jquery'), '1', true );
		// wp_enqueue_script( 'vimeo', 				'https://player.vimeo.com/api/player.js', 				array('jquery'), '1', true );
		// wp_enqueue_script( 'youTube', 			'https://www.youtube.com/iframe_api', 					array('jquery'), '1', true );
		// wp_enqueue_script( 'googlemaps', 		'https://maps.googleapis.com/maps/api/js?key=XXXXXX', 	array('jquery'), '2.6.1', true );
		// }