<?php get_header(); ?>

	<div>
		
		<?php 


			// AD NOTE TO AD - 26th JAN...
			// need to loop through kit, get kit category ACF, then add it to kit category TAXONOMY, and also get that kit categories sub category ACF (e.g. lenses), and add that in as a child taxonomy of parent tax.

			// maybe we just add all the taxonomies in, and then organise the actual taxonomy afterwards. So just chuck all tax in at parent level. And then manually restrucutre the category afterwards

			$args = array(
			    'post_type'    => 'kit',
			    // 'title_li' => ''
			    // 'order' => 'ASC',
			    'posts_per_page' => -1,
			    // 'orderby' => 'menu_order',
			    // 'post_status'  => 'publish',
			    // 'post_parent' => 0, // just the parents
			    // 'author' => $idutente, // must be comma separated list of IDs
			);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
			    echo '<ul>';
				    while ( $the_query->have_posts() ) {
				        $the_query->the_post(); ?>
				        <h3><?php the_title(); ?></h3>
				        <?php
				        	$tag = get_field( "category" );
							// print_r($tag);

							// SET POST TERM...
							$post_id = $post->ID;
							$taxonomy = 'kit_category'; 
							echo "<pre>";
							print_r($post_id);
							echo "<br/>";
							print_r($tag);
							echo "<br/>";
							print_r($taxonomy);
							echo "</pre>";

							// DO NOT UNCOMMENT THIS LINE TIL READY...
							// wp_set_post_terms( $post_id, $tag, $taxonomy );

						?>
			        <?php }
			    echo '</ul>';
			} else {
			    // no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();

		?>

	</div>

	<article class="entry-content wrapper">

		<h1>[ Homepage content TBC ]</h1>

	</article>

<?php get_footer(); ?>