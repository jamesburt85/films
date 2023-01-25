<?php 

/**
 * Text Block
 * 
 * @param   array $block The block settings and attributes
 * @param   string $content The block inner HTML (empty)
 * @param   bool $is_preview True during AJAX preview
 * @param   (int|string) $post_id The post ID this block is saved to 
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$title              = get_field( 'title' ) ?? null;
$copy               = get_field( 'copy' ) ?? null;
$ctas               = get_field( 'ctas_ctas' ) ?? null;

// Create id attribute allowing for custom "anchor" value.
$id = 'statement-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-statement';
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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> [ wrapper ]">

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

</div>