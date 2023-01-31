<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article class="entry-content wrapper">
			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

			<h1><?php the_title(); ?></h1>

			<div class="with-sidebar">
				
				<div class="sidebar">
					
					

					<?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>

					<?php $terms = get_the_terms( $post->ID, 'people_category' );

					if (!empty($terms)) { ?>

						<ul>

							<?php foreach ( $terms as $term ) { ?>
								<li>
									<?php echo $term->name; ?>
								</li>
							<?php } ?>

						</ul>

					<?php } ?>

				</div>


				<div class="not-sidebar flow">
			
					<?php the_content();?>

				</div>

			</div>
			
			<?php // include( get_template_directory() . '/template-parts/snippets/share-bar.php'); ?>
	</article>

<?php 
endwhile;
endif; 
?>
<?php get_footer(); ?>