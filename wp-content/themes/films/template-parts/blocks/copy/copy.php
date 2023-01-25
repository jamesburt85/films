<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$title              = get_field( 'title' ) ?? null;
$copy               = get_field( 'copy' ) ?? null;
$optional_image     = get_field( 'optional_image' ) ?? null;
$orientation        = get_field( 'orientation' ) ?? null;
$ctas               = get_field( 'ctas_ctas' ) ?? null;

// Create id attribute allowing for custom "anchor" value.
$id = 'copy-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-copy';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
if ( ! empty( $orientation ) ) {
    $classes .= ' ' . $orientation;
}

?>

<style type="text/css">
  <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
  }
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    
    <div class="[ wrapper ]">
        
        <div>
            <?php if ( $title ) : ?>
                <h1><?php echo $title; ?></h1>
            <?php endif; ?>

            <?php if ( $copy ) : ?>
                <p><?php echo $copy; ?></p>
            <?php endif; ?>

            <?php if ( $ctas ) :
              foreach ($ctas as $link):
                $link = $link['cta'];
                include( get_template_directory() . '/template-parts/snippets/link__button.php');
              endforeach;
            endif; ?>
        </div>

        <?php if ( $optional_image ) :
            $img = $optional_image;
            include( get_template_directory() . '/template-parts/snippets/img.php');
        endif; ?>

    </div>

</div>