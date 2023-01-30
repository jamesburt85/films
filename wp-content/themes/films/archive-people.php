<?php get_header(); ?>

	<article class="entry-content wrapper">

		<h1>Films@59 - a Family of Experts</h1>

		<p>Nullam quis risus eget urna mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

		<!-- <h2>View our people below.</h2> -->


		
		<?php 
			// https://wordpress.stackexchange.com/questions/103958/custom-post-type-hierarchical-loop-in-homepage

			$args = array(
			    'post_type' => 'people',
			    'tax_query' => array(
		            array (
		                'taxonomy' => 'people_category',
		                'field' => 'slug',
		                'terms' => 'management',
		            )
		        ),
			    'post_status'  => 'publish',
			);
			// wp_list_pages($args);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
			        echo '<h2>Management</h2><div class="[ card-grid ]">';
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
			wp_reset_postdata();

		?>

		<div class="[ flow ] [ category-cards ]">
			<?php
				//if (is_post_type_archive('work')) {
					include( get_template_directory() . '/template-parts/snippets/category-list.php');
				// } elseif (is_post_type_archive('service_cpt')) {
				// 	$showTax = 'service_cpt';
				// 	include( get_template_directory() . '/template-parts/snippets/category-list.php');
				//}
			?>
		</div>
		
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php //include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

	</article>

<?php get_footer(); ?>