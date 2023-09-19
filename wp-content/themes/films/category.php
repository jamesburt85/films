<?php get_header(); ?>

	<article class="entry-content no-hero wrapper">

		<div class="flow--medium">

			<div>
				<?php include( get_template_directory() . '/template-parts/snippets/post-category-list.php'); ?>
			</div>

			<div class="flex-space-between">

				<?php echo '<h1>' . single_cat_title('', false) . '</h1>'; ?>

				<!-- <div class="searchform">
					<?php //get_template_part('searchform'); ?>
				</div> -->
			</div>
		</div>
		
		<?php
			$columns = 'three-columns';
		?>
		<div class="[ card-grid ] <?php echo $columns; ?>">

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
			    'post_type' => 'post',
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


	</article>

<?php get_footer(); ?>