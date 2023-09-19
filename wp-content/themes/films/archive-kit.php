<?php get_header(); ?>

	<article class="entry-content no-hero">

		<?php
			//set archives in site settings, then pull in content from that page
			if (is_post_type_archive('kit')) { 
				$post = get_field('kit_archive', 'option');
				if (!empty($post)) {
					// echo "<pre>";
					// print_r($post);
					// echo "</pre>";
					setup_postdata($post);

					the_content();
				}
				wp_reset_postdata();
			}
		?>

	</article>

<?php get_footer(); ?>