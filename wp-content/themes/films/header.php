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
	
	<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>

	<header class="site-header [ color-light ]">
		<div class="wrapper site-header--wrapper">
			<div class="site-header--inner">
					
				<div class="site-header--left">
					<div class="site-header--logo">
						<a aria-label="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php
								$img = get_field('company_logo', 'option');

								include( get_template_directory() . '/template-parts/snippets/img.php');
							?>
						</a>
					</div>
				</div>

				<div class="site-header--right [ flex ] [ align-center ]">

					<div class="site-header-desktop-menu">
						<div class="primary-navigation [ uppercase ] tiny--nav bold">
							<?php ray_primary_nav(); ?>
							<!-- <a href="#" class="js-toggle-secondary-navigation">
								More
							</a> -->
						</div>
					</div>

					<div class="site-header-mobile-toggle">

						<button type="button" class="js-toggle-secondary-navigation js-hamburger hamburger hamburger--squeeze" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button> 

					</div>

				</div>

			</div>

			<div class="secondary-navigation--container color-primary-shade">
				<div class="secondary-navigation--container__inner">
					<div class="wrapper [ flow ]">

						<button type="button" class="js-close-secondary-navigation js-hamburger hamburger hamburger--squeeze is-active">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>

						<div>
							<?php ray_primary_nav(); ?>
						</div>

						<div>
							<?php ray_secondary_nav(); ?>
						</div>
						
						<div class="secondary-navigation--footer flow--small flex-space-between">
							<div>
								<?php get_template_part('template-parts/snippets/socials'); ?>
							</div>
							<div>
								<a class="secondary-navigation--footer-email" href="<?php the_field('email', 'option') ?>">
									<?php the_field('email', 'option') ?>
								</a>
								<p>
									<?php the_field('telephone', 'option') ?>
								</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>

		</div>
	</header>
	<div class="header-scroll__wrapper">
		<div class="header-scroll wrapper">
			<div class="site-header-mobile-toggle">

				<button type="button" class="js-toggle-secondary-navigation js-hamburger hamburger hamburger--squeeze" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button> 

			</div>
		</div>
	</div>

	<body <?php body_class('bg-dark color-light font-base body'); ?>>

		<?php //if (is_front_page()) { ?>
		<!-- <div class="js-loader loader">
			<?php //get_template_part('dist/svg_php/inline', 'logo.svg'); ?>
		</div> -->
		<?php //} ?>
		
		<?php // get_template_part( 'template-parts/devbar' ); ?>
	
		
		
		<?php $page_colour  = get_field( 'page_colour' ); ?>

		<?php
			if ( is_post_type_archive('work') ) { 
				$page_colour = get_field('work_page_colour', 'option');
			} else if (is_post_type_archive('kit') || is_tax('kit_category') || is_singular('kit') ) {
				$page_colour = get_field('kit_page_colour', 'option');
			} else if (is_post_type_archive('careers')) {
				$page_colour = get_field('careers_page_colour', 'option');
			}
		?>


		

		<main id="site-content-container" class="site-content-container <?php echo $page_colour; ?>">

