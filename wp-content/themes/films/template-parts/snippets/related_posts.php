<?php 
	include( get_template_directory() . '/template-parts/logic/getRelatedPosts.php');
	$loop = new WP_Query( $args );
	if (!empty($args2)) {
		$loop2 = new WP_Query( $args2 );
	}
	
	// echo "<pre>";
	// print_r($loop->posts);
	// echo "</pre>";

	$pType = get_post_type();
	// $i++;
	

	if ( $loop->have_posts() ) { ?>
		<div class="related-posts wrapper flow">
			<!-- <h6 class=""><?php // the_field('related_posts_heading', 'option'); ?></h6> -->
			<h3 class="">Related Posts</h3>
			<div class="cards-container card-grid">
				<?php

					while ( $loop->have_posts() ) {
						$loop->the_post();
						// include( get_template_directory() . '/template-parts/cards/card.php');
						if ($pType == 'webinar_cpt' || $pType == 'whitepaper_cpt' || $pType == 'post' || $pType == 'cs_cpt') {
							if ($pType == 'post') {
								include( get_template_directory() . '/template-parts/cards/card.php');
							} else {
								include( get_template_directory() . '/template-parts/cards/card-'.$pType.'.php');
							}
						} else {
							get_template_part( 'template-parts/cards/card', get_post_type() );
						}
					}
					wp_reset_postdata();

					if ( !empty($loop2) ) {
						if ( $loop2->have_posts() ) {

							while ( $loop2->have_posts() ) {
								$loop2->the_post();
								// include( get_template_directory() . '/template-parts/cards/card.php');
								if ($pType == 'webinar_cpt' || $pType == 'whitepaper_cpt' || $pType == 'post' || $pType == 'cs_cpt') {
									if ($pType == 'post') {
										include( get_template_directory() . '/template-parts/cards/card.php');
									} else {
										include( get_template_directory() . '/template-parts/cards/card-'.$pType.'.php');
									}
								} else {
									get_template_part( 'template-parts/cards/card', get_post_type() );
								}
							}
							wp_reset_postdata();

						}
					}

				?>
			</div>
		</div>
	<?php }
?>