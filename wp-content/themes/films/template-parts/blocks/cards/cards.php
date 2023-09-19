<?php
/**
 * Block template file: cards.php
 *
 * Cards Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$title                      = get_field( 'title' ) ?? null;
$copy                       = get_field( 'copy' ) ?? null;
$cards_to_show              = get_field( 'cards_to_show' ) ?? 'latest';
$select_posts               = get_field( 'select_posts' ) ?? null;
$post_type_to_show          = get_field( 'post_type_to_show' ) ?? 'post';
$number_of_posts_to_show    = get_field( 'number_of_posts_to_show' ) ?? '3';
$ctas                       = get_field( 'ctas_ctas' ) ?? null;
$options                    = get_field( 'options' );
$id                         = get_field( 'id' );

// Create id attribute allowing for custom "anchor" value.
// $id = 'cards-' . $block['id'];
// if ( !empty($block['anchor'] ) ) {
//     $id = $block['anchor'];
// }

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-cards';
if ( !empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( !empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
    <?php echo '#' . $id; ?> {
        /* Add styles that use ACF values here */
    }
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> [ wrapper ]">
    <div class="<?php if($options){ echo ' '.implode(" ", $options); } ?> [ flow ]">
        <?php if ( $title || $copy ) { ?>
            <div class="flow--small">
                <?php if ( $title ) : ?>
                    <h2 class="section-header fade-in-up">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $copy ) : ?>
                    <p class="fade-in-up">
                        <?php echo $copy; ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php } ?>

        <?php
            if ( $post_type_to_show == 'kit') {
        ?>
                <div class="search--container flex-space-between flow--small">

                    <h2 class="body--large">
                        Browse Our Equipment
                    </h2>

                    <div class="searchform">
                        <?php get_template_part('searchform-kit'); ?>
                    </div>
                </div>
            <?php
                get_template_part( 'template-parts/snippets/category-list--card' );
            }
        ?>

        <?php
            $columns = 'three-columns';

            if ( $post_type_to_show == 'people') {
                $columns = 'five-columns';
            }
        ?>

        <?php if ( $post_type_to_show == 'cpt_careers' ) { ?>
            <div class="card fade-in-up">
                <p class="tiny medium">
                    Current Vacancies
                </p>
            </div>
        <?php } ?>

        <div class="[ card-grid ] <?php echo $columns; ?> <?php echo $post_type_to_show; ?> fade-in-up">

            <?php
                if( $cards_to_show == 'latest' && $post_type_to_show != 'kit' ) {
                    // echo "<pre>"; print_r($post_type_to_show); echo "</pre>";
                    // echo "<pre>"; print_r($number_of_posts_to_show); echo "</pre>";

                    // $args = array(
                    //     'posts_per_page'    => $number_of_posts_to_show,
                    //     'post_type'         => $post_type_to_show
                    // );

                    // $posts = get_posts( $args );
                    // $postsCount = count( $posts );
                    // echo "<pre>"; print_r($posts); echo "</pre>";            
                    // echo "<pre>"; print_r($postsCount); echo "</pre>";

                    $args = array(
                        'post_type' => $post_type_to_show,
                        'posts_per_page' => $number_of_posts_to_show,
                        //'post_status' => 'publish',
                        //'post__in' => $select_testimonials,
                        // 'orderby' => 'rand',
                   );
                        // echo "<pre>"; print_r($args); echo "</pre>";
                    $posts = get_posts($args);
                    //echo "<pre>"; print_r($posts); echo "</pre>";
                    if( $posts ) {
                        //echo "<pre>"; print_r($posts); echo "</pre>"; 

                        global $post;

                        foreach( $posts as $post ):

                            setup_postdata( $post );

                            //include( get_template_directory() . '/template-parts/cards/card.php');

                            $pType = get_post_type();
                            get_template_part( 'template-parts/cards/card', $pType );

                        endforeach;

                        wp_reset_postdata();

                    }

                } else {
                    // echo "<pre>"; print_r($select_posts); echo "</pre>";
                    global $post;
                    
                    foreach ($select_posts as $post) {
                        // echo "<pre>"; print_r($post); echo "</pre>";
                        // $pType = $post->post_type ?? 'post';
                        // echo "<pre>"; print_r($pType); echo "</pre>";
                        setup_postdata($post);

                        //include( get_template_directory() . '/template-parts/cards/card-'. $pType .'.php');
                        $pType = get_post_type();
                        get_template_part( 'template-parts/cards/card', $pType );
                    }

                    wp_reset_postdata();
                }
            ?>




                    <?php
                    // global $post;

                    //$currPagePost = $post;

                    // foreach ($posts as $post) {
                    //     // echo "<pre>"; print_r($post); echo "</pre>";
                    //     // $pType = $post->post_type ?? 'post';
                    //     // echo "<pre>"; print_r($pType); echo "</pre>";
                    //     // if( get_field('active_case_study') ) {
                    //     //     echo "ACTIVEEVEVE";
                    //     // }
                    //     setup_postdata($post);
                    //     // include( get_template_directory() . '/template-parts/cards/card-'. $pType .'.php');
                    //     $pType = get_post_type();
                    //     get_template_part( 'template-parts/cards/card', $pType );
                    // }

                    // wp_reset_postdata();

                    // $post = $currPagePost;

                // }
            ?>

        </div>

        <?php if ( $ctas ) :
          foreach ($ctas as $link):
            $link = $link['cta'];
            include( get_template_directory() . '/template-parts/snippets/link__button.php');
          endforeach;
        endif; ?>

    </div>
</div>