<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!-- <div class="hero">	
		<?php //include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
	</div> -->

	<?php
		$no_hero = '';
		if ( !is_singular('post') ) {
			$no_hero = 'no-hero';
		}
	?>
	
	<?php
	  	if ( get_post_type() == 'post' ) { ?>
	  	<article class="entry-content article--no-margin">
	  		<div id="" class="block-hero small-hero">

	  		    <div class="hero-image__container">
	  		        
	  		        <div class="hero_image">
	  		            <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
	  		        </div>

	  		        <div class="wrapper hero--title-wrapper">
	  		            <div class="hero--title-container">
	  		                <?php //if ( $hero_title ) : ?>
	  		                    <h1 class="hero-title">
	  		                        <div class="overflow-hidden">
	  		                            <div class="fade-in-up-big">
	  		                                <span>
	  		                                    <?php the_title(); ?>
	  		                                </span>
	  		                            </div>
	  		                        </div>
	  		                        
	  		                        <?php
	  		                            //if ( $hero_title_bold ) {
	  		                        ?>
	  		                                <!-- <br /> -->
	  		                                <!-- <div class="overflow-hidden"> 
	  		                                    <div class="fade-in-up-big">
	  		                                        <span>
	  		                                            <strong>
	  		                                                <?php //echo $hero_title_bold; ?>
	  		                                            </strong>
	  		                                        </span>
	  		                                    </div>
	  		                                </div> -->
	  		                        <?php
	  		                            //}
	  		                        ?>
	  		                    </h1>
	  		                <?php //endif; ?>
	  		            </div>
	  		        </div>

	  		    </div>
	  		</div>

	  		<article class="article--no-margin">
	  			<div class="wrapper flow">
	  				<?php the_content(); ?>
	  			</div>
	  		</article>
	  	</article>

	<?php } ?>

	<article class="entry-content <?php echo $no_hero; ?>">
		<div class="wrapper">
			<div class="wrapper--narrow">
				<?php 
					if (get_post_type() == 'kit') { ?>

						<!-- <a class="arrow-link" href="<?php //echo get_post_type_archive_link( 'kit' ); ?>"><?php //get_template_part('dist/svg_php/inline', 'arrow-left-thin.svg'); ?> Back to Kit</a> -->

				<?php } elseif (get_post_type() == 'people') { ?>

						<a class="arrow-link" href="<?php echo get_post_type_archive_link( 'people' ); ?>"><?php get_template_part('dist/svg_php/inline', 'arrow-left-thin.svg'); ?> Back to People</a>

				<?php } ?>
				
				<?php if (get_post_type() == 'kit') { ?>

					<div class="flow--medium">

						<?php
							$pType = 'kit';
							include( get_template_directory() . '/template-parts/snippets/kit-category-list.php');
						?>

						<div class="flex-space-between">

							<?php if (is_tax('kit_category') || is_singular('kit')) { ?>
								<?php
								// Get the current taxonomy term
								$current_term = get_queried_object();

								// Check if the queried object is a term
								if ($current_term instanceof WP_Term) {
								?>

									<h1 class="body--large">
										<?php
										    // Echo the name of the current taxonomy term
										    echo $current_term->name;
										    the_category();
										?>
									</h1>

								<?php
								}

								// Get the terms (taxonomy) associated with the current post
						        $terms = get_the_terms(get_the_ID(), 'kit_category'); // Replace 'your_taxonomy_slug' with the actual taxonomy slug

						        if ($terms && !is_wp_error($terms)) {
						            echo '<h1 class="hero-large">';
						            foreach ($terms as $term) {
						                echo esc_html($term->name);
						            }
						            echo '</h1>';
						        }
								?>
							<?php } ?>
							<?php
								if ( is_singular('kit') ) {
							?>
									<div class="searchform">
										<?php get_template_part('searchform-kit'); ?>
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

				<?php } ?>

				<div class="single-content flow">

					<?php
						if ( is_singular('kit') ) {
					?>
							<div class="side-by-side">
								<div>
									<h1 class="hero-large">
										<?php the_title(); ?>
									</h1>

									<?php
										// Get the terms (taxonomy) associated with the current post
										$terms = get_the_terms(get_the_ID(), 'kit_category'); 

										// Replace 'your_taxonomy_slug' with the actual taxonomy slug
										if ($terms && !is_wp_error($terms)) {
										    echo '<p class="tiny color-grey medium">';
										    foreach ($terms as $term) {
										        echo esc_html($term->name);
										    }
										    echo '</p>';
										}
									?>
									<?php the_content(); ?>
								</div>

								<div>
									<?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
								</div>
							</div>

							<?php //the_content(); ?>

							<?php $related_kit = get_field( 'related_kit' ); ?>
							<?php if ( $related_kit ) : ?>
								<h2 class="body--large">
									Related Kit
								</h2>

								<div class="card-grid three-columns">
									<?php foreach ( $related_kit as $post ) : ?>
										<?php setup_postdata ( $post ); ?>
											<?php get_template_part( 'template-parts/cards/card' );
											?>
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								</div>
							<?php endif; ?>
					<?php
						}
					?>
					
					<?php
					  	if ( get_post_type() == 'post' ) { ?>

							<a class="arrow-link" href="<?php echo get_post_type_archive_link( 'post' ); ?>">
								<?php get_template_part('dist/svg_php/inline', 'arrow-left-thin.svg'); ?> Back to Posts
							</a>
					<?php } ?>

				</div>
			</div>
		</div>

		
		<?php // include( get_template_directory() . '/template-parts/snippets/share-bar.php'); ?>

		<?php if (get_post_type() == 'kit') { ?>

			
		<?php } ?>

		<?php 
			// if (get_post_type() == 'post') {
			// 	include( get_template_directory() . '/template-parts/snippets/related_posts.php');
			// }
		?>

	</article>

<?php 
endwhile;
endif; 
?>
<?php get_footer(); ?>