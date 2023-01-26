<?php get_header(); ?>

	<article class="entry-content wrapper">

		<h1><?php the_title(); ?></h1>

		<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

		<?php include( get_template_directory() . '/template-parts/snippets/category-list.php'); ?>
		
		<div class="[ card-grid ]">

			<?php

			$queried_object = get_queried_object();
			// echo "<pre>";
			// var_dump( $queried_object );
			// echo "</pre>";

			$the_query = new WP_Query( array(
			    'post_type' => 'work',
			    'tax_query' => array(
			        array (
			            'taxonomy' => 'work_category',
			            'field' => 'slug',
			            'terms' => $queried_object->slug,
			        )
			    ),
			) );

			while ( $the_query->have_posts() ) :
			    $the_query->the_post();
			    get_template_part( 'template-parts/cards/card' );
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

	</article>

<?php get_footer(); ?>