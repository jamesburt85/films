<?php get_header(); ?>

	<div id="homepage-overlay" class="homepage-overlay">
		<?php get_template_part('src/copy/inline', 'films-logo-split.svg'); ?>
	</div>

	<article class="entry-content">

		<?php the_content(); ?>

	</article>

<?php get_footer(); ?>