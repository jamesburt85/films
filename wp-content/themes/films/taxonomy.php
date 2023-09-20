<?php get_header(); ?>

	<article class="entry-content no-hero wrapper">

		<!-- <h1><?php //the_title(); ?></h1> -->

		<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

		<div class="flow--medium">

			<?php
				if (is_tax('work_category') ) {

					$pType = 'work';
					include( get_template_directory() . '/template-parts/snippets/category-list.php');

				} elseif (is_tax('work_department')) {

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

			<div class="flex-space-between">
				<?php if (is_tax('kit_category') || is_tax('people_category') || is_tax('work_category') || is_tax('work_department') || is_single('kit')) { ?>
					<?php
					// Get the current taxonomy term
					$current_term = get_queried_object();

					// Check if the queried object is a term
					if ($current_term instanceof WP_Term) {
					?>

						<h1 class="body--large capitalize">
							<?php
							    // Echo the name of the current taxonomy term
							    echo $current_term->name;
							?>
						</h1>

					<?php
					}
					?>
				<?php } ?>

				<?php
					if ( is_tax('kit_category') ) {
				?>
						<div class="searchform">
							<?php get_template_part('searchform-kit'); ?>
						</div>
				<?php } else if ( is_tax('people_category') ) { ?>

						<div class="searchform">
							<?php get_template_part('searchform-people'); ?>
						</div>

				<?php } else { ?>
						<div class="searchform">
							<?php get_template_part('searchform'); ?>
						</div>
				<?php } ?>
			</div>

			<div>
				<?php include( get_template_directory() . '/template-parts/snippets/taxonomy-children-list.php'); ?>
			</div>
		</div>
		
		<?php
			$columns = 'five-columns';
			if (is_tax('kit_category') ) {
				$columns = 'four-columns kit-columns';
			} else if ( is_tax('work_category') || is_tax('work_department') ) {
				$columns = 'accordion';
			}

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
			$order = '';
			if (is_tax('people_category') ) {
				$order = 'rand';
			}
			$the_query = new WP_Query( array(
			    'post_type' => $pType,
			    'orderby'  => $order,
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
			    if ( is_tax('work_category') || is_tax('work_department') ) {
			    	get_template_part( 'template-parts/snippets/post-list', $pType );
			    } else {
			    	get_template_part( 'template-parts/cards/card' );
			    }
			    // get_template_part( 'template-parts/snippets/post-list', $pType );
			    // get_template_part( 'template-parts/cards/card', $pType );
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