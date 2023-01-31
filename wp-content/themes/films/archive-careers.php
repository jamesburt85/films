<?php get_header(); ?>

	<article class="entry-content wrapper">

		<h1>Careers</h1>

		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

		<?php //the_content(); ?>
		
		<div class="[ card-grid ]">

			<?php // $i = 0; // styling some cards...

			while ( have_posts() ) : the_post();
				
				// $pType = get_post_type();
				// if (!$pType) {
				// 	$pType = 'work_cpt';
				// }
				get_template_part( 'template-parts/cards/card', $pType );

			endwhile; ?>

		</div>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

	</article>

<?php get_footer(); ?>