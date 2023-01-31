<?php get_header(); ?>

	<article class="entry-content wrapper">

		<h1><?php the_title(); ?></h1>

		<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

		<?php
			if (is_tax('work_category') ) {

				$pType = 'work';
				include( get_template_directory() . '/template-parts/snippets/category-list.php');

			} elseif (is_tax('kit_category')) {

				$pType = 'kit';
				include( get_template_directory() . '/template-parts/snippets/kit-category-list.php');

			} elseif (is_tax('people_category')) {

				$pType = 'people';
				include( get_template_directory() . '/template-parts/snippets/category-list.php');

			}
		?>
		
		<div class="[ card-grid ]">

			<?php

			$queried_object = get_queried_object();
			// echo "<pre>";
			// var_dump( $queried_object );
			// echo "</pre>";

			// if (is_tax('people_category')) {
			// 	'people_category'
			// } elseif (is_tax('kit_category')) {
			// 	'people_category'
			// } elseif (is_tax('kit_category')) {
			// 	'people_category'
			// }

			$the_query = new WP_Query( array(
			    'post_type' => $pType,
			    'tax_query' => array(
			        array (
			            'taxonomy' => $queried_object->taxonomy,
			            'field' => 'slug',
			            'terms' => $queried_object->slug,
			        )
			    ),
			) );

			// echo "<pre>";
			// var_dump( $the_query );
			// echo "</pre>";

			while ( $the_query->have_posts() ) :
			    $the_query->the_post();
			    $pType = get_post_type($post->ID);
			    // get_template_part( 'template-parts/cards/card' );
			    if (empty($pType)) {
			    	$pType = '';
			    }
			    get_template_part( 'template-parts/cards/card', $pType );
			    // Show Posts ...
			endwhile;

			/* Restore original Post Data 
			 * NB: Because we are using new WP_Query we aren't stomping on the 
			 * original $wp_query and it does not need to be reset.
			*/
			wp_reset_postdata();

			// while ( have_posts() ) : the_post();
				
			// 	// $pType = get_post_type();
			// 	// if (!$pType) {
			// 	// 	$pType = 'work_cpt';
			// 	// }
			// 	get_template_part( 'template-parts/cards/card' );
			// 	// get_template_part( 'template-parts/cards/card', $pType );

			// endwhile; 

			?>

		</div>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>


		<?php if (is_tax('kit_category')) { ?>
			<div class="with-sidebar">
				<div class="sidebar">
					<h1>Our Kit</h1>
					<p>Our state-of-the-art kit room and highly skilled experts are dedicated to discovering the ultimate kit for your shoot, ensuring an unparalleled result.</p>
				</div>
				<div class="not-sidebar">
					<?php include( get_template_directory() . '/template-parts/snippets/kit-contact.php'); ?>
				</div>
			</div>

			<div>

			</div>
		<?php } ?>

	</article>

<?php get_footer(); ?>