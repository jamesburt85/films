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
	$active_case_study		= $acf_fields['active_case_study'] ?? null;

}

?>

<?php if ($active_case_study) { ?>
    <a href="<?php the_permalink(); ?>">
<?php } ?>

    <article class="[ card ] [ flow ] [ bg-secondary ]" <?php if ($active_case_study) { ?> data-status="clickable" <?php } ?> >

                <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
        
            <?php the_title( '<h2 class="entry-title">', '</h2>' );  ?>

            <?php if ($active_case_study) { ?>
                <?php get_template_part('dist/svg_php/inline', 'arrow-right.svg'); ?>
            <?php } ?>


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

<?php if ($active_case_study) { ?>
    </a>
<?php } ?>