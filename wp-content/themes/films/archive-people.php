<?php get_header(); ?>

	<article class="entry-content flow">

		<div class="wrapper flow">
			
			<h1>Films@59 - a Family of Experts</h1>

			<p>Nullam quis risus eget urna mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

		</div>

		<!-- <div class="flow"> -->

			<?php 

				// set archives in site settings, then pull in content from that page
				if (is_post_type_archive('people')) { 
					$post = get_field('people_archive', 'option');
					if (!empty($post)) {
						// echo "<pre>";
						// print_r($post);
						// echo "</pre>";
						setup_postdata($post);
						the_content();
					}
					wp_reset_postdata();
				}

			?>

		<!-- </div> -->

		<div class="wrapper flow">

			<?php 

				// https://wordpress.stackexchange.com/questions/103958/custom-post-type-hierarchical-loop-in-homepage

				$args = array(
				    'post_type' => 'people',
				    'tax_query' => array(
			            array (
			                'taxonomy' => 'people_category',
			                'field' => 'slug',
			                'terms' => 'craft',
			            )
			        ),
				    'post_status'  => 'publish',
				);
				// wp_list_pages($args);

				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {
				        echo '<h2>Craft</h2><div class="[ card-grid ]">';
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
			<br/>
			<br/>
			<h2>People Directory:</h2>

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

		</div>

	</article>

<?php get_footer(); ?>