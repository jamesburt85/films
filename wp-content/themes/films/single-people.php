<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article class="entry-content wrapper article--padding article--no-margin">
			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

			<a class="arrow-link color-grey" href="<?php echo get_post_type_archive_link( 'people' ); ?>"><?php get_template_part('dist/svg_php/inline', 'arrow-left-thin.svg'); ?> Back to Our People</a>

			<div class="flow">
				<div class="image-galllery">
					<div class="side-by-side">
						<div class="image-galllery--container">
							<?php 
							$images = get_field('people_gallery');
							if( $images ) { ?>
							    <div class="js-slick">
							    	<div class="image-wrapper">
							    		<?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>	
							    	</div>
							    	
							        <?php foreach( $images as $img ): ?>
							            <div class="image-wrapper">
							            	<?php include( get_template_directory() . '/template-parts/snippets/img.php'); ?>
							            </div>
							        <?php endforeach; ?>
							    </div>
							    <div class="gradient--right"></div>
							<?php } else { ?>
								<div class="js-slick">
									<div class="image-wrapper">
										<?php
											include( get_template_directory() . '/template-parts/logic/get_featured_img.php');
										?>
									</div>
								</div>

							<?php
							} ?>
						</div>
					</div>
				</div>
				
				<div class="side-by-side">
					<div class="[ flow ]">
						<div>
							<?php the_title( '<h2 class="entry-title body--plus light">', '</h2>' );  ?>

							<p class="tiny color-grey medium">
							    <?php
							        echo get_field('role');
							    ?>
							</p>
						</div>

						<div class="[ flow ]">
							<?php
								if ( get_field('email') ) {
							?>
									<a href="mailto:<?php the_field('email'); ?>" class="body--plus">
										<?php the_field('email'); ?>
									</a>
							<?php
								}
							?>
							<div class="flow--small">
							<?php if ( have_rows( 'projects' ) ) : ?>
								
									<p class="tiny medium color-grey">
										Credits include
									</p>

									<ul class="tiny medium">
									<?php while ( have_rows( 'projects' ) ) : the_row(); ?>
										<li>
										<?php $project = get_sub_field( 'project' ); ?>
										<?php if ( $project ) : ?>
											<?php $post = $project; ?>
											<?php setup_postdata( $post ); ?> 
											<a class="no-underline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>
										</li>
									<?php endwhile; ?>
								<?php else : ?>
									<?php // No rows found ?>
									</ul>
								
							<?php endif; ?>
							</div>

						</div>
					</div>

					<div class="not-sidebar flow">
					
						<?php the_content();?>

					</div>
					
				</div>
			</div>
			
			<?php // include( get_template_directory() . '/template-parts/snippets/share-bar.php'); ?>
	</article>

<?php 
endwhile;
endif; 
?>
<?php get_footer(); ?>