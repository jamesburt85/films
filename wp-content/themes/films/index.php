<?php get_header(); ?>

	<article class="entry-content wrapper">

		<h1><?php // the_title(); ?></h1>

		<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

		<?php
			if (is_post_type_archive('work')) { ?>
				<div class="work-intro with-sidebar">
					<div class="sidebar">
						<h1>Our Portfolio</h1>
						<p>For over 25 years we have provided a range of award-winning services to producers across the globe. Supplying location kit hire, rushes management, vision & sound post, and freelancer crew & editor diaries.</p>
					</div>
					<div class="not-sidebar">
						<?php 
							$video_url 	= 'https://vimeo.com/676353092';
							$vimID      = getVimeoID($video_url);
							// print_r($vimID);
							// $videoType = getVideoType($url);
							$videoType = 'vimeo';
							include( get_template_directory() . '/template-parts/snippets/video.php');
						?>
					</div>
				</div>
			<?php }

			if (is_post_type_archive('kit')) { ?>
				<div class="work-intro with-sidebar">
					<div class="sidebar">
						<h1>Our Kit</h1>
						<p>Our state-of-the-art kit room and highly skilled experts are dedicated to discovering the ultimate kit for your shoot, ensuring an unparalleled result.</p>
					</div>
					<div class="not-sidebar">
						<!-- <img src="https://picsum.photos/900/<?php echo rand(500, 700); ?>?random=1&grayscale&blur=5"> -->
						<h2>Our team of experts are ready to help find the perfect kit for your shoot</h2>
						<?php gravity_form( 1, false, false, false, '', false ); ?>
					</div>
				</div>

				<div>

				</div>
			<?php }
		?>

		<?php
			if (is_post_type_archive('work')) {
				include( get_template_directory() . '/template-parts/snippets/category-list.php');
			// } elseif (is_post_type_archive('service_cpt')) {
			// 	$showTax = 'service_cpt';
			// 	include( get_template_directory() . '/template-parts/snippets/category-list.php');
			} elseif (is_post_type_archive('kit')) {
				include( get_template_directory() . '/template-parts/snippets/kit-category-list.php');
			// } elseif (is_post_type_archive('service_cpt')) {
			// 	$showTax = 'service_cpt';
			// 	include( get_template_directory() . '/template-parts/snippets/category-list.php');
			}
		?>
		
		<div class="[ card-grid ]">

			<?php // $i = 0; // styling some cards...

			while ( have_posts() ) : the_post();
				
				// $pType = get_post_type();
				// if (!$pType) {
				// 	$pType = 'work_cpt';
				// }
				// get_template_part( 'template-parts/cards/card', $pType );
				get_template_part( 'template-parts/cards/card' );

			endwhile; ?>

		</div>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>


		<?php 
			// https://wordpress.stackexchange.com/questions/103958/custom-post-type-hierarchical-loop-in-homepage

		if (is_post_type_archive('kit')) { 

			$args = array(
			    'post_type' => 'people',
			    'posts_per_page' => -1,
			    'tax_query' => array(
		            array (
		                'taxonomy' => 'people_category',
		                'field' => 'slug',
		                'terms' => 'kit',
		            )
		        ),
			    'post_status'  => 'publish',
			);
			// wp_list_pages($args);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
			        echo '<h2>Our Kit Team</h2><div class="[ card-grid ]">';
			    while ( $the_query->have_posts() ) {
			        $the_query->the_post();

			        // get_template_part( 'template-parts/cards/card', $pType );
			        get_template_part( 'template-parts/cards/card' );

			    }
			        echo '</div>';
			} else {
			    // no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata(); ?>


			<h2>Our team of experts are ready to help find the perfect kit for your shoot</h2>
			<?php gravity_form( 1, false, false, false, '', false ); ?>

		<?php }

		?>


	</article>

<?php get_footer(); ?>