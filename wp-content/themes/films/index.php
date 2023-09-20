<?php get_header(); ?>

<?php if (is_home()) { ?>
	<article class="entry-content article--no-margin">
<?php } else { ?>
	<article class="entry-content">
<?php } ?>


	<?php
		// set archives in site settings, then pull in content from that page
		if (is_post_type_archive('work')) { 
			$archivepage = get_field('work_archive', 'option');
		} else if (is_post_type_archive('kit')) { 
			$archivepage = get_field('kit_archive', 'option');
		} else if (is_post_type_archive('careers')) {
			$archivepage = get_field('careers_archive', 'option');
		} else if (is_home()) {
			$archivepage = get_field('news_archive', 'option');
		}

		if (!empty($archivepage)) {
			// echo "<pre>";
			// print_r($post);
			// echo "</pre>";
			$post = $archivepage;
			setup_postdata($post);

			the_content();
		}
		wp_reset_postdata();

	?>

	<?php if ( is_home() ) { ?>
		<div class="flow--medium">
			<div class="wrapper">
				<?php include( get_template_directory() . '/template-parts/snippets/post-category-list.php'); ?>
			</div>

			<div class="[ card-grid ] [ three-columns ] wrapper">

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
				<?php //include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

			</div>
		</div>
	<?php } ?>

	<?php if (is_post_type_archive('work')) { ?>
		
		<div id="case-studies" class="wrapper flow--small fade-in-up">
			<h3 class="tiny medium uppercase">
				Case Studies
			</h3>
			<!-- Initial list of Featured Posts -->
			<div class="[ card-grid ] [ three-columns ]">
				
				<?php
					while ( have_posts() ) : the_post();

						$active_case_study = get_field('active_case_study');
						
						if ( $active_case_study ) {
						
							$pType = get_post_type($post->ID);
							// echo "<pre>";
							// print_r($pType);
							// echo "</pre>";
							if (empty($pType)) {
								$pType = '';
							}
							get_template_part( 'template-parts/cards/card', $pType );
							// get_template_part( 'template-parts/cards/card' );
						}

					endwhile;
				?>
			</div>
		</div>

	<?php // } elseif (is_home() || is_category()) { ?>

		<?php // include( get_template_directory() . '/template-parts/snippets/post-category-list.php'); ?>

	<?php } ?>
	
	<?php if (is_post_type_archive('work')) { ?>
		<div id="our-work" class="wrapper [ flow--medium ] post-list">

			<div class="side-by-side fade-in-up">
				<div class="[ flow--small ]">
					<h3 class="tiny medium uppercase">
						Projects
					</h3>
					<div>
						<!-- <ul class="flex">
							<li class="pill active">All</li>
							<li class="pill">Post</li>
							<li class="pill">Hire</li>
						</ul> -->
						<?php include( get_template_directory() . '/template-parts/snippets/category-list--pills.php'); ?>
					</div>
				</div>

				<div class="[ flow--small ]">
					<h3 class="tiny medium uppercase">
						Genre
					</h3>
					<div>
						<?php include( get_template_directory() . '/template-parts/snippets/category-list.php'); ?>
					</div>
				</div>
			</div>

			<div class="accordion">
				<?php // $i = 0; // styling some cards...
					// ACF DUMP
					$acf_fields = get_fields();
				
					//print_r($acf_fields);

					// if (!empty($active_case_study)) {

					//     // echo "<pre>"; print_r($acf_fields); echo "</pre>";
					//     $active_case_study = $acf_fields['active_case_study'] ?? null;

					// }
					
					while ( have_posts() ) : the_post();
						$active_case_study = get_field('active_case_study');
						//if ( !$active_case_study ) {
						
							$pType = get_post_type($post->ID);
							// echo "<pre>";
							// print_r($pType);
							// echo "</pre>";
							if (empty($pType)) {
								$pType = '';
							}
							get_template_part( 'template-parts/snippets/post-list', $pType );
							// get_template_part( 'template-parts/cards/card' );
						//}

					endwhile;
				
				?>
			</div>

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php //include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

		</div>
	<?php } else if (!is_post_type_archive('kit') && !is_home()) { ?>
		<div class="[ card-grid ] [ four-columns ] wrapper">

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

		</div>
	<?php } ?>

	<?php if (is_home()) { ?>
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>
	<?php } ?>
	
</article>

<?php get_footer(); ?>