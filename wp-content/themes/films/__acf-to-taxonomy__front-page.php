<?php get_header(); ?>

	<div>
		
		<?php 

			// need to loop through kit, get kit category ACF, then add it to kit category TAXONOMY, and also get that kit categories sub category ACF (e.g. lenses), and add that in as a child taxonomy of parent tax.

			// get all kit taxonomies and their IDs as we'll need them...

			$kit_cats = get_terms( array(
			    'taxonomy' => 'kit_category',
			    'hide_empty' => false,
			) );

			// echo "<pre>";
			// print_r($kit_cats);
			// echo "</pre>";

			$arrayOfCats = array();

			foreach ($kit_cats as $key => $value) {
			// 	// code...
			// }
			// foreach ($kit_cats as $katcat) {

				// echo "<pre>";
				// print_r($key);
				// echo "<br/>";
				// print_r($value);
				// echo "</pre>";

				$slug = $value->slug;
				$term_id = $value->term_id;
				echo "<pre>";
				print_r($slug);
				echo "<br/>";
				print_r($term_id);
				echo "</pre>";

				// $arrayOfCats = array();

				$arrayOfCats[$slug] = $term_id;
				// array_push($arrayOfCats, array($slug, $term_id));
				// $arrayOfCats[$key] = $value[$term_id];

			}

			echo "<pre>";
			print_r($arrayOfCats);
			echo "</pre>";


			$args = array(
			    'post_type'    => 'kit', // people
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
				        	$kit_category = get_field( "kit_category" );
				        	$solid_state_category = get_field( "solid_state_category" );
				        	$accessory_category = get_field( "accessory_category" );
				        	$lens_category = get_field( "lens_category" );
							// print_r($tag);

							// now get the IDs from any categories item has, by checking the above array // $arrayOfCats



							echo "<pre>";
							print_r($kit_category);
							echo "<br/>";
							print_r($solid_state_category);
							echo "<br/>";
							print_r($accessory_category);
							echo "<br/>";
							print_r($lens_category);
							echo "</pre>";

							$TaxIDsToBeAdded = [];

							if (!empty($kit_category)) {
								$kit_cat_ID = $arrayOfCats[$kit_category];
								$TaxIDsToBeAdded[] = $kit_cat_ID;
							}

							if (!empty($solid_state_category)) {
								$kit_cat_ID = $arrayOfCats[$solid_state_category];
								$TaxIDsToBeAdded[] = $kit_cat_ID;
							}

							if (!empty($accessory_category)) {
								$kit_cat_ID = $arrayOfCats[$accessory_category];
								$TaxIDsToBeAdded[] = $kit_cat_ID;
							}

							if (!empty($lens_category)) {
								$kit_cat_ID = $arrayOfCats[$lens_category];
								$TaxIDsToBeAdded[] = $kit_cat_ID;
							}

							// GOT TO HERE.
							// MAKING THE ARRAY OF IDS

							echo "<h1>bosh:</h1>";
							echo "<pre>";
							print_r($TaxIDsToBeAdded);
							echo "</pre>";

							// SET POST TERM...
							$post_id = $post->ID;
							$taxonomy = 'kit_category';  // people_category
							echo "<pre>";
							print_r($post_id);
							echo "<br/>";
							print_r($tags);
							echo "<br/>";
							print_r($taxonomy);
							echo "</pre>";

							// DO NOT UNCOMMENT THIS UNLESS YOUR READY TO REPLACE ALL KIT TAXs...
							// wp_set_post_terms( $post_id, $TaxIDsToBeAdded, $taxonomy );

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