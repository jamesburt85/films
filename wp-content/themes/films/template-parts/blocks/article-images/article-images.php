<?php
/**
 * Block template file: article-images.php
 *
 * Article Images Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";
$images = get_field( 'images' ) ?? null;
// echo "<pre>"; print_r($gallery); echo "</pre>";

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-article-images';
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

<?php
  if (is_array($images) && count($images) > 1) {
      $parent_div_class = 'multiple-images';
  } else {
      $parent_div_class = '';
  }
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> [ flow--medium ] overlap">

  <?php if ( $images ) : ?>
    <div class="wrapper article-images--wrapper <?php echo $parent_div_class; ?>">
      <?php foreach ( $images as $img ): ?>
        
        <div class="card">
          <?php include( get_template_directory() . '/template-parts/snippets/img.php'); ?>

          <div class="card--lower">
            <p class="tiny medium">
              <?php echo esc_html( $img['caption'] ); ?>
            </p>
          </div>
        </div>
        
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div>