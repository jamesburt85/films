<?php get_header(); ?>

	<article class="entry-content wrapper">

		<h1>testing <?php the_title(); ?></h1>

		<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

		<?php
			if (is_post_type_archive('work')) {
				include( get_template_directory() . '/template-parts/snippets/category-list.php');
			// } elseif (is_post_type_archive('service_cpt')) {
			// 	$showTax = 'service_cpt';
			// 	include( get_template_directory() . '/template-parts/snippets/category-list.php');
			}
		?>
		
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