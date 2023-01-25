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

  // settings
  $post_author			= $acf_fields['select_post_author'] ?? null;
  $post_style			= $acf_fields['post_style'] ?? null;

}

if (empty($post_author)) {
	$post_author		= get_field('default_post_author', 'option');
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<div class="post-header--inner-wrapper">

			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

			<div class="post-header--content">
				<div class="post-header--copy">
					
					<?php
						if ( is_single() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
					?>

					<?php if(!empty($post_author)):

						include( get_template_directory() . '/template-parts/snippets/get-post-author-card.php');
						
					endif; ?>

					<?php // ray_entry_meta(); ?>
					<?php // ray_category_meta(); ?>
					<?php ray_entry_and_category_meta(); ?>

				</div>

				<div class="post-header--image">
					<div class="post-header--image--inner-wrapper">
						
						<?php include( get_template_directory() . '/template-parts/logic/get-featured-img.php'); ?>
						<?php // include( get_template_directory() . '/template-parts/snippets/img.php'); ?>
					
					</div>
				</div>
			</div>
			
		</div>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<footer class="entry-footer">
		<?php
			wp_link_pages(
				array(
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					'after'  => '</p></nav>',
				)
			);
		?>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
</article>
