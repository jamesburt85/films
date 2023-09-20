<?php
/**
 * Block template file: hero.php
 *
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$hero_title = get_field( 'hero_title' ) ?? null;
$hero_title_bold  = get_field( 'hero_title_bold' ) ?? null;
$images = get_field( 'hero_image' ) ?? null;

$link_one = get_field( 'link_one' ) ?? null;
$link_two = get_field( 'link_two' ) ?? null;

$hero_bg_colour = get_field( 'hero_bg_colour' ) ?? null;
$hero_ctas_ctas = get_field( 'hero_ctas_ctas' ) ?? null;
$navigation     = get_field( 'navigation' ) ?? null;

$options = get_field('options');

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Background Colours
$hero_bg_colour = '';
if ( ! empty( $block['data']['hero_bg_colour'] ) ) {
    $hero_bg_colour = 'style="background-color:' . esc_attr( $block['data']['hero_bg_colour'] ) . ';" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-hero';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<!-- <style type="text/css">
    <?php //echo '#' . $id; ?> {
        /* Add styles that use ACF values here */
    }
</style> -->

<div id="<?php echo esc_attr( $id ); ?>" <?php echo $hero_bg_colour; ?> class="<?php echo esc_attr( $classes ); ?><?php if($options){ echo ' '.implode(" ", $options); } ?>">

    <div class="hero-image__container">
        
        <div class="hero_image">

            <?php
                //$home_carousel_images = get_field('home_carousel');
                //if( $home_carousel_images ) {
            ?>
                <div class="js-slick-hero">
                    
                    <?php foreach ( $images as $img ) { ?>
                        
                        <?php include( get_template_directory() . '/template-parts/snippets/img--hero.php'); ?>
                        
                    <?php } ?>

                </div>
            <?php
                //} else {
                    //if ( $img ) { ?>
                        <?php //include( get_template_directory() . '/template-parts/snippets/img--hero.php'); ?>
                    <?php //}
                //}
            ?>
            

            <?php
                $link_one = get_field('link_one');
                if ( $link_one ) {
            ?>
                    <div class="hero--link__container wrapper">
                        
                        <?php
                            if( $link_one ): 
                                $link_url = $link_one['url'];
                                $link_title = $link_one['title'];
                                $link_target = $link_one['target'] ? $link_one['target'] : '_self';
                        ?>

                        <div class="hero__link fade-in-up">
                            <a class="hero-small no-underline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                <span>
                                    <?php echo esc_html( $link_title ); ?>
                                </span>
                            </a>
                        </div>
                            
                        <?php endif; ?>

                        <?php
                            $link_two = get_field('link_two');
                            if( $link_two ): 
                                $link_url = $link_two['url'];
                                $link_title = $link_two['title'];
                                $link_target = $link_two['target'] ? $link_two['target'] : '_self';
                        ?>
                        <div class="hero__link fade-in-up">
                            <a class="hero-small no-underline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                <span>
                                    <?php echo esc_html( $link_title ); ?>
                                </span>
                            </a>
                        </div>

                        <?php endif; ?>

                    </div>
            <?php
                }
            ?>
            
        </div>

        <div class="wrapper hero--title-wrapper">
            <div class="hero--title-container">

                <?php if ( $hero_title ) : ?>
                    <h1 class="hero-title">
                        <div class="overflow-hidden">
                            <div class="fade-in-up-big">
                                <span>
                                    <?php echo $hero_title; ?>
                                </span>
                            </div>
                        </div>
                        
                        <?php
                            if ( $hero_title_bold ) {
                        ?>
                                <!-- <br /> -->
                                <div class="overflow-hidden"> 
                                    <div class="fade-in-up-big">
                                        <span>
                                            <strong>
                                                <?php echo $hero_title_bold; ?>
                                            </strong>
                                        </span>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                    </h1>
                <?php endif; ?>  
                <?php
                    if ( is_singular('work') ) {

                        // Get the terms (taxonomy) associated with the current post
                        $terms = get_the_terms(get_the_ID(), 'work_broadcaster_category'); 

                        // Replace 'your_taxonomy_slug' with the actual taxonomy slug
                        if ($terms && !is_wp_error($terms)) {
                            echo '<span class="tiny color-grey medium">';
                            foreach ($terms as $term) {
                                echo esc_html($term->name);
                            }
                            echo '</span>';
                        }
                    }
                ?>
            </div>
        </div>

    </div>

</div>

<?php
    $project_specifics = get_post_meta(get_the_ID(), 'project_specifics', true);
    if ($project_specifics) {
        $formatted_project_specifics = wpautop($project_specifics);
?>

        <div class="tiny hero--text wrapper">
            <?php echo $formatted_project_specifics; ?>
        </div>
<?php
    }
?>

<?php
    //if ( is_singular('work') ) {

        if ( $options && in_array('add-nav', $options) ) {
    ?>
            <div class="page-nav medium">
                <div class="wrapper">
                    <?php
                        if ( $navigation ) {
                    ?>
                        <ul>
                        <?php
                            foreach ($navigation as $nav) {
                                
                                $link = $nav['link'];
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <li>
                                        <a class="highlighted-hover uppercase" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                            <?php echo esc_html( $link_title ); ?>
                                        </a>
                                    </li>
                                <?php endif;
                            }
                    ?>
                        </ul>
                    <?php
                        }
                    ?>
                </div>
            </div>
    <?php
        }
    //}
?>

