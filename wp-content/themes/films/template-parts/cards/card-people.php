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
$post_id = get_the_ID(); // Get the current post ID

//if (!empty($acf_fields)) {
    //echo "<pre>"; print_r($acf_fields); echo "</pre>";
    //$active_case_study = $acf_fields['active_case_study'] ?? null;
    $active_case_study = get_field('active_case_study', $post_id);
    //$role = $acf_fields['role'];
    $role = get_field('role', $post_id);
//}

?>

<article class="[ card ] [ flow--small ] card--portrait fade-in-up">
    
    <?php if ($active_case_study) { ?>
        <a class="[ flow--small ] no-underline" href="<?php the_permalink();?>">
    <?php } ?>

            <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>

            <h2 class="entry-title body light">
                <?php the_title();  ?>
            </h2>
        
    <?php if ($active_case_study) { ?>
        </a>
    <?php } ?>

    <p class="tiny color-grey medium">
        <?php
            echo $role;
        ?>
    </p>

</article>
