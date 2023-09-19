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
    $role = $acf_fields['role'] ?? null;
	// echo "<pre>"; print_r($acf_fields); echo "</pre>";
	// $post_author		= $acf_fields['post_author'] ?? null;
}

?>
<article class="[ card ] [ flow ] [ flow--small ] fade-in-up">

    <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>

    <div class="card--lower [ flow--small ]">

        <?php the_title( '<h2 class="entry-title body--large no-underline"><a class="medium" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );  ?>

        <?php the_excerpt(); ?>

    </div>

</article>
