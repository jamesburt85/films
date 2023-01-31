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
	// $post_author		= $acf_fields['post_author'] ?? null;

}

?>

<article class="[ card ] [ flow ] [ bg-secondary ]">

    <a href="<?php the_permalink();?>">
        <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
    </a>

    
    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );  ?>

    <?php

        $categories = wp_get_object_terms( $id, 'work_category');
        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";
        if (!empty($categories)) {
            foreach ($categories as $cat) { ?>
                <p><?php echo $cat->name; ?></p>
            <?php }
        }

    ?>

</article>
