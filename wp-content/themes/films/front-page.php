<?php get_header(); ?>

	<article class="entry-content wrapper">

		<h1>[ Homepage content TBC ]</h1>

		<?php 

			// get all people, loop through them, get the ACF category and add it to the custom taxonomy...

			$args = array(
			    'post_type'    => 'service_cpt',
			    // 'title_li' => ''
			    'order' => 'ASC',
			    'posts_per_page' => -1,
			    'orderby' => 'menu_order',
			    'post_status'  => 'publish',
			    'post_parent' => 0, // just the parents
			    // 'author' => $idutente, // must be comma separated list of IDs
			);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
			        echo '<ul>';
			    while ( $the_query->have_posts() ) {
			        $the_query->the_post();
			        ?>

			        	<h3><?php the_title(); ?></h3>
			        	<img src="https://picsum.photos/900/<?php echo rand(500, 700); ?>?random=1&grayscale&blur=5">
			        	<!-- <img src="https://picsum.photos/900/<?php // echo rand(500, 700); ?>?random=1&grayscale&blur=2"> -->
			        	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

			        <?php 

			    }
			        echo '</ul>';
			} else {
			    // no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();

		?>

	</article>

<?php get_footer(); ?>