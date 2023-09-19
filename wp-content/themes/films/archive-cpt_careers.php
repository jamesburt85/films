<?php get_header(); ?>
	
	<article class="entry-content">

		<?php
			// set archives in site settings, then pull in content from that page
			if (is_post_type_archive('cpt_careers')) {

				$archivepage = get_field('careers_archive', 'option');
				
				if (!empty($archivepage)) {
					// echo "<pre>";
					// print_r($post);
					// echo "</pre>";
					$post = $archivepage;

					setup_postdata($post);

					the_content();
				}
				wp_reset_postdata();
			}
		?>

	</article>

<?php get_footer(); ?>