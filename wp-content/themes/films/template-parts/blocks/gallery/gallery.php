<?php
/**
 * Block template file: gallery.php
 *
 * Gallery Block Template.
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
$id = 'gallery-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-gallery';
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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> [ flow--medium ]">

  <?php if ( have_rows( 'galleries' ) ) :
      $i=1;
  ?>

    <?php while ( have_rows( 'galleries' ) ) : the_row();
      // Check if the child is even (zero-based index)
      //$class = ($i % 2 == 0) ? 'odd' : 'even';
      $class = $i;
      $i++;
    ?>
      <div class="gallery-row overlap gsap-scroll-<?php echo $class; ?>">
        <div class="card-grid three-columns">
        <?php $gallery_images = get_sub_field( 'gallery' ); ?>
        <?php if ( $gallery_images ) :  ?>
          <?php foreach ( $gallery_images as $gallery_image ): ?>
            <div class="card">
              
              <a class="js-image-popup" href="<?php echo esc_url( $gallery_image['url'] ); ?>">
                <img src="<?php echo esc_url( $gallery_image['sizes']['featured-medium'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>">
              </a>
              
              <div class="card--lower">
                <p class="tiny medium">
                  <?php echo esc_html( $gallery_image['caption'] ); ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>

    <?php else : ?>
      <?php // No rows found ?>
    <?php endif; ?>
  
</div>