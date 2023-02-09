<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- favicon start -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/src/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/src/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/src/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/src/favicons/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/src/favicons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/src/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/src/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<!-- favicon end -->
		
		<!-- HEAD CHECK -->		
		<!-- <link rel="stylesheet" href="https://csswizardry.com/ct/ct.css" class="ct" /> -->

		<!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet"> -->

		<?php get_template_part( 'template-parts/googlefonts' ); ?>
		<?php // get_template_part( 'template-parts/adobefonts' ); ?>

		<?php wp_head(); ?>

		<?php // no-js / js body class ?>
		<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

	</head>

	<?php 
		// // styling of whole page
		// $post_style = null;
		// // ACF DUMP
		// $acf_fields = get_fields();
		// if (!empty($acf_fields)) {
		//   // echo "<pre>"; print_r($acf_fields); echo "</pre>";
		//   // settings
		//   $post_style			= $acf_fields['post_style'] ?? null;
		//   $post_style = 'post_style__'.$post_style;
		// }
	?>

	<body <?php body_class('bg-light color-primary font-base'); ?>>

		<?php // get_template_part( 'template-parts/devbar' ); ?>
	
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
			
		<main id="site-content-container" class="site-content-container">

			<header class="site-header [ bg-secondary ]">

				<div class="wrapper site-header--inner [ bg-secondary ]">
						
					<div class="site-header--left">
						<div class="site-header--logo">
							<a aria-label="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php get_template_part('dist/svg_php/inline', 'f59-logo.svg'); ?>
							</a>
						</div>
					</div>

					<div class="site-header--right">

						<div class="site-header-desktop-menu">
							<div class="primary-navigation">
								<?php ray_primary_nav(); ?>
								<a href="#" class="js-toggle-secondary-navigation">
									More
								</a>
								
								<?php get_template_part('template-parts/snippets/socials'); ?>
							</div>
						</div>

						<div class="site-header-mobile-toggle">

							<!-- Off-canvas toggle button -->
							<button type="button" class="js-off-canvas-menu-button button js-hamburger hamburger hamburger--squeeze" type="button">
								<span class="hamburger--label hamburger--label__closed">Menu</span>
								<span class="hamburger--label hamburger--label__open">Close</span>
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button> 

						</div>

					</div>

				</div>

				<div class="secondary-navigation">
					<div class="wrapper">
						<?php ray_secondary_nav(); ?>
					</div>
				</div>

			</header>
