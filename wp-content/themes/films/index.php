<?php get_header(); ?>

	<article class="entry-content wrapper">

		<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

		<?php // include( get_template_directory() . '/template-parts/snippets/filter-bar.php'); ?>
		
		<div class="[ card-grid ]">


			<?php // $i = 0; // styling some cards...

			while ( have_posts() ) : the_post();	
				
				$pType = get_post_type();
				get_template_part( 'template-parts/cards/card', $pType );

			endwhile; ?>

		</div>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

	</article>

<?php get_footer(); ?>