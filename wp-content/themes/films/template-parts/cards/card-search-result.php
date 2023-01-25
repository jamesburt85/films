<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// ACF DUMP
$acf_fields = get_fields();

if (!empty($acf_fields)) {

	// echo "<pre>"; print_r($acf_fields); echo "</pre>";

}

?>

<article id="post-<?php the_ID(); ?>" <?php // post_class($cardClasses); ?> >
	<div class="card--content-wrapper">
		<div class="card--content">

			<div class="card--copy">
				
				<div class="card--copy--top-section">

					<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					?>

					<?php // ray_entry_meta(); ?>
					<?php // ray_category_meta(); ?>
					<?php ray_entry_and_category_meta(); ?>

				</div>

			</div>

		</div>
	</div>
</article>
