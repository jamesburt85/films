
<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="entry-content [ wrapper ]">
				<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>
				<?php the_content();?>
			</article>
	<?php 
	endwhile;
	endif; 
	?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php
	if ( is_paged() ) :
	?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php endif; ?>

<?php get_footer();
