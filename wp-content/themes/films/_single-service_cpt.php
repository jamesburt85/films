<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article class="entry-content wrapper">
			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

			<?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>

			<h1><?php the_title(); ?></h1>

			<?php the_content();?>

			<?php $people = get_field( 'people' ); ?>
			<?php if ( $people ) : ?>
				<div>
					<h2>
						People
					</h2>
					<div class="[ card-grid ]">
						<?php foreach ( $people as $post ) : ?>
							<?php setup_postdata ( $post ); ?>
							<?php get_template_part( 'template-parts/cards/card', $pType ); ?>
							
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php include( get_template_directory() . '/template-parts/snippets/share-bar.php'); ?>
	</article>

<?php 
endwhile;
endif; 
?>
<?php get_footer(); ?>