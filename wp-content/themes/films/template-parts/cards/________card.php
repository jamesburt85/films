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
<article class="[ card ] [ flow ] [ flow--small ]">
    
    <a href="<?php the_permalink();?>">
        <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
    </a>

    <div class="card--lower [ flow--small ]">
        <?php the_title( '<h2 class="entry-title body--large no-underline"><a class="medium" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );  ?>

        <?php the_content(); ?>

        <?php
            if (is_post_type_archive('people')) {
                echo get_field('role');
            }
        ?>

        <?php
            $categories = wp_get_object_terms( $id, 'work_category');
            $categories = wp_get_object_terms( $id, 'kit_category');
            // $categories = wp_get_object_terms( $post->ID, 'work_category');
            // echo "<pre>";
            // print_r($categories);
            // echo "</pre>";
            if (!empty($categories)) {
        ?>
            <div class="tiny color-grey medium no-underline">
                <?php
                    //$role = get_field('role');
                    
                    echo $role;
                    echo get_the_term_list( $post->ID, 'kit_category', '', ' / ' );
                //foreach ($categories as $cat) { ?>
                    
                <?php //echo $cat->name; ?>

            </div>
        
        <?php  } ?>

    </div>

</article>
