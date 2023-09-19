<?php get_header(); ?>

	<article class="entry-content">

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

		<div id="our-people" class="wrapper flow">

			<?php
				// https://wordpress.stackexchange.com/questions/103958/custom-post-type-hierarchical-loop-in-homepage
				$pType = 'people';
				$args = array(
				    'post_type' => $pType,
				    'posts_per_page' => -1,
				    // 'tax_query' => array(
			     //        array (
			     //            'taxonomy' => 'people_category',
			     //            'field' => 'slug',
			     //            'terms' => 'craft',
			     //        )
			     //    ),
				    'post_status'  => 'publish',
				    'orderby'  => 'rand',
				);
				// wp_list_pages($args);

				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) {
					
					include( get_template_directory() . '/template-parts/snippets/category-list--pills.php');
					
				        echo '<div class="[ card-grid ] [ five-columns ] ">';
				    while ( $the_query->have_posts() ) {
				        
				        $the_query->the_post();

				        get_template_part( 'template-parts/cards/card-people' );

				    }
				        echo '</div>';
				} else {
				    // no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();

			?>
			
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php //include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

		</div>

	</article>

<?php get_footer(); ?>