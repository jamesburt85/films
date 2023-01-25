<?php
/**
 * Block template file: sitewide.php
 *
 * Sitewide Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";
$ssb = get_field( 'selected_sitewide_blocks' ) ?? null;

// Create id attribute allowing for custom "anchor" value.
$id = 'sitewide-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-sitewide';
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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
  <?php if ( $ssb ) :
    global $post;
    foreach ($ssb as $post) {
      setup_postdata($post);
      the_content();
    }
    wp_reset_postdata();
  endif; ?>
</div>