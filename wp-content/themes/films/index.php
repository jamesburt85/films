<?php get_header(); ?>

	<article class="entry-content">

		<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

		<div class="wrapper">
			
		

		<?php
			if (is_post_type_archive('work')) { ?>
				<?php 
					//Get the current page number, default is 1
					 $current_page = get_query_var('paged', 1);
					 // print_r($current_page);

					 if ($current_page == 0){ ?>
					     
					     <div class="work-intro with-sidebar">
					     	<div class="sidebar flow">
					     		<h1>Our Portfolio</h1>
					     		<p>For over 25 years we have provided a range of award-winning services to producers across the globe. Supplying location kit hire, rushes management, vision & sound post, and freelancer crew & editor diaries.</p>
					     	</div>
					     	<div class="not-sidebar">
					     		<?php 
					     			$video_url 	= 'https://vimeo.com/676353092';
					     			$vimID      = getVimeoID($video_url);
					     			// print_r($vimID);
					     			// $videoType = getVideoType($url);
					     			$videoType = 'vimeo';
					     			include( get_template_directory() . '/template-parts/snippets/video.php');
					     		?>
					     	</div>
					     </div>

					<?php  }
				?>
				
			<?php }

			if (is_post_type_archive('kit')) { ?>
				<div class="work-intro with-sidebar">
					<div class="sidebar">
						<h1>Everything your shoot needs</h1>
						<p>Our state-of-the-art kit room and highly skilled experts are dedicated to discovering the ultimate kit for your shoot, ensuring an unparalleled result.</p>
					</div>
					<div class="not-sidebar">
						<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/03/hire_9.jpg">
					</div>
				</div>

				<div>

				</div>
			<?php }
		?>



		<?php
			if (is_post_type_archive('work')) {
				include( get_template_directory() . '/template-parts/snippets/category-list.php');
			// } elseif (is_post_type_archive('service_cpt')) {
			// 	$showTax = 'service_cpt';
			// 	include( get_template_directory() . '/template-parts/snippets/category-list.php');
			} elseif (is_post_type_archive('kit')) {
				include( get_template_directory() . '/template-parts/snippets/kit-category-list.php');
			} elseif (is_home() || is_category()) {
				include( get_template_directory() . '/template-parts/snippets/post-category-list.php');
			}
		?>

		</div>
		
		<div class="[ card-grid ] wrapper">

			<?php // $i = 0; // styling some cards...

			while ( have_posts() ) : the_post();
				
				$pType = get_post_type($post->ID);
				// echo "<pre>";
				// print_r($pType);
				// echo "</pre>";
				if (empty($pType)) {
					$pType = '';
				}
				get_template_part( 'template-parts/cards/card', $pType );
				// get_template_part( 'template-parts/cards/card' );

			endwhile; ?>


		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

		</div>

		<?php 

			// set archives in site settings, then pull in content from that page
			if (is_post_type_archive('kit')) { 
				$post = get_field('kit_archive', 'option');
				if (!empty($post)) {
					// echo "<pre>";
					// print_r($post);
					// echo "</pre>";
					setup_postdata($post);
					the_content();
				}
				wp_reset_postdata();
			}

			// // set archives in site settings, then pull in content from that page
			// if (is_post_type_archive('people')) { 
			// 	$post = get_field('people_archive', 'option');
			// 	if (!empty($post)) {
			// 		// echo "<pre>";
			// 		// print_r($post);
			// 		// echo "</pre>";
			// 		setup_postdata($post);
			// 		the_content();
			// 	}
			// 	wp_reset_postdata();
			// }

			// set archives in site settings, then pull in content from that page
			if (is_post_type_archive('work')) { 
				$post = get_field('work_archive', 'option');
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

		<?php 
			// https://wordpress.stackexchange.com/questions/103958/custom-post-type-hierarchical-loop-in-homepage



		if (is_post_type_archive('kit')) { 

			include( get_template_directory() . '/template-parts/snippets/kit-contact.php');

			$args = array(
			    'post_type' => 'people',
			    'posts_per_page' => -1,
			    'tax_query' => array(
		            array (
		                'taxonomy' => 'people_category',
		                'field' => 'slug',
		                'terms' => 'kit',
		            )
		        ),
			    'post_status'  => 'publish',
			);
			// wp_list_pages($args);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
			        echo '<div class="wrapper flow"><h2>Our Kit Team</h2><div class="[ card-grid ]">';
			    while ( $the_query->have_posts() ) {
			        $the_query->the_post();

			        // get_template_part( 'template-parts/cards/card', $pType );
			        get_template_part( 'template-parts/cards/card' );

			    }
			        echo '</div>';
			        echo '</div>';
			} else {
			    // no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();



			


			?>


		<?php }

		?>


	</article>

<?php get_footer(); ?>