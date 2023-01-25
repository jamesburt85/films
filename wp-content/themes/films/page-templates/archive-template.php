<?php
/*
Template Name: Archive Page
*/

get_header();

	$postType = get_post_type();

	if ($postType == null) {
		$postType = 'post';
	}

	if ($postType == 'cpt_work'):
		$archive_page	= get_field('work_archive_page', 'option');
	elseif ($postType == 'post'):
		$archive_page	= get_field('blog_archive_page', 'option');
	endif;

	?>

	<article class="entry-content">

		<?php if(!empty($archive_page)):

			$archive_p = new WP_Query("page_id=".$archive_page);

			while ( $archive_p->have_posts() ) : $archive_p->the_post();

				include( get_template_directory() . '/template-parts/archive-intro.php');

			    // get_template_part( 'template-parts/acf' );
			    // include( get_template_directory() . '/template-parts/acf.php');
			endwhile;

			wp_reset_postdata();

		endif; ?>


		<div class="entry-content">
			<?php while ( have_posts() ) : the_post(); ?>		
					<?php get_template_part( 'template-parts/card', get_post_type() ); ?>
			<?php endwhile; ?>
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php 
				// get current page we are on. If not set we can assume we are on page 1.
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				// are we on page one?
				if(1 == $paged) :
					include( get_template_directory() . '/template-parts/snippets/post-nav.php');
				endif; ?>
		</div>
	</article>
<?php get_footer(); ?>