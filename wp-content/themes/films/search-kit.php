<?php get_header(); ?>
<article class="entry-content wrapper article--no-margin">
	
	<header>
		<h1 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		
		<div class="[ card-grid ] [ three-columns ]">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php //get_template_part( 'template-parts/cards/card', get_post_type() ); ?>
				<?php get_template_part( 'template-parts/cards/card-search-result' ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

		</div>

	<?php endif; ?>

	<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

</article>

<?php get_footer();
