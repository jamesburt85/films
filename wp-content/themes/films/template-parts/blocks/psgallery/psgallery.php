<?php
/**
 * Block template file: psgallery.php
 *
 * psgallery Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";
$gallery = get_field( 'ps_gallery' ) ?? null;
// echo "<pre>"; print_r($gallery); echo "</pre>";

// Create id attribute allowing for custom "anchor" value.
$id = 'psgallery-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-psgallery';
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

  <?php if(!empty($gallery)): ?>
    <div id="gallery" class="js-photoswipe image-gallery-grid">
    <?php foreach ($gallery as $img):
      include( get_template_directory() . '/template-parts/snippets/img-photoswipe.php');
    endforeach; ?>
    </div>
  <?php endif; ?>
  
</div>