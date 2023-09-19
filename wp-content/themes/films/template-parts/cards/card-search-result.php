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

    <?php if ( get_post_type() != 'cpt_careers' ) { ?>
            <a href="<?php the_permalink();?>">
                <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
            </a>
    <?php } ?>

    <div class="card--lower [ flow--small ]">

        <?php the_title( '<h2 class="entry-title body--large no-underline"><a class="medium" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );  ?>

        <?php if (is_tax('kit_category')) { ?>
            <?php
            // Get the current taxonomy term
            $current_term = get_queried_object();

            // Check if the queried object is a term
            if ($current_term instanceof WP_Term) {
            ?>

                <p class="tiny color-grey medium">
                    <?php
                        // Echo the name of the current taxonomy term
                        echo $current_term->name;
                    ?>
                </p>

            <?php
            }
            ?>
        <?php } ?>

        

        <?php if ( get_post_type() != 'cpt_careers' && get_post_type() !='kit' && !is_home() ) { ?>
            <?php //the_content(); ?>
        <?php } ?>

        <?php if ( get_post_type() == 'cpt_careers' ) { ?>
            <div>
                <a href="<?php the_permalink(); ?>">
                    More Details
                </a>
            </div>
        <?php } ?>   

    </div>

</article>
