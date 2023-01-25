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
$hero_copy = get_field( 'hero_copy' ) ?? null;

$hero_image = get_field( 'hero_image' ) ?? null;
$hero_bg_colour = get_field( 'hero_bg_colour' ) ?? null;
$hero_ctas_ctas = get_field( 'hero_ctas_ctas' ) ?? null;

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

<style type="text/css">
    <?php echo '#' . $id; ?> {
        /* Add styles that use ACF values here */
    }
</style>

<div id="<?php echo esc_attr( $id ); ?>" <?php echo $hero_bg_colour; ?> class="<?php echo esc_attr( $classes ); ?>">
    <div class="wrapper">

        <?php if ( $hero_title ) : ?>
            <h1><?php echo $hero_title; ?></h1>
        <?php endif; ?>
        
        <?php $hero_image = get_field( 'hero_image' ); ?>
        <?php if ( $img = $hero_image ) : ?>
            <div class="hero_image">
                <?php include( get_template_directory() . '/template-parts/snippets/img.php'); ?>
            </div>
        <?php endif; ?>
        
        

        <?php if ( $hero_copy ) : ?>
            <p><?php echo $hero_copy; ?></p>
        <?php endif; ?>

        <?php if ( have_rows( 'hero_ctas_ctas' ) ) : ?>
            <?php while ( have_rows( 'hero_ctas_ctas' ) ) : the_row(); ?>
                <?php $link = get_sub_field( 'cta' ); ?>
                <?php if ( $link ) :
                    include( get_template_directory() . '/template-parts/snippets/link__button.php');
                endif; ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>
        
    </div>
</div>