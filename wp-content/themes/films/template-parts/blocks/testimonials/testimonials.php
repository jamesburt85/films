<?php
/**
 * Block template file: testimonials.php
 *
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$title          = get_field( 'title' ) ?? null;
$copy           = get_field( 'copy' ) ?? null;
$testimonials   = get_field( 'testimonials' ) ?? null;
$ctas           = get_field('testimonials_ctas_ctas') ?? null;

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-testimonials';
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
  
  <?php if ( $title ) : ?>
      <h1><?php echo $title; ?></h1>
  <?php endif; ?>

  <?php if ( $copy ) : ?>
      <p><?php echo $copy; ?></p>
  <?php endif; ?>

  <?php if ( $testimonials ) :
    foreach ($testimonials as $t):
      $quote          = $t['quote'];
      $quote_author   = $t['quote_author']; ?>
      <blockquote>
        <?php echo $quote; ?>
        <figcaption><?php echo $quote_author; ?></figcaption>
      </blockquote>
    <?php endforeach;
  endif; ?>

  <?php if ( $ctas ) :
    foreach ($ctas as $link):
      $link = $link['cta'];
      include( get_template_directory() . '/template-parts/snippets/link__button.php');
    endforeach;
  endif; ?>

</div>
