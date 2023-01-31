<?php
/**
 * Block template file: people.php
 *
 * People Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$title    = get_field( 'title' ) ?? null;
$copy     = get_field( 'copy' ) ?? null;
$people   = get_field( 'people' ) ?? null;

// Create id attribute allowing for custom "anchor" value.
$id = 'people-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-people';
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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> [ wrapper ] [ flow ]">
  
  <?php if ( $title ) : ?>
      <h2><?php echo $title; ?></h2>
  <?php endif; ?>

  <?php if ( $copy ) : ?>
      <p><?php echo $copy; ?></p>
  <?php endif; ?>

  <?php
  if( $people ) {
      echo '<div class="[ card-grid ]">';
      global $post;

      foreach ($people as $post) {

          // $permalink = get_permalink( $post->ID );
          // $title = get_the_title( $post->ID );

          // echo "<pre>"; print_r($post); echo "</pre>";
          // $pType = $post->post_type ?? 'post';
          // echo "<pre>"; print_r($pType); echo "</pre>";

          setup_postdata($post);
          // include( get_template_directory() . '/template-parts/cards/card-'. $pType .'.php');
          $pType = get_post_type();
          get_template_part( 'template-parts/cards/card', $pType );
      }
      
      wp_reset_postdata();

      echo '</div">';

      }
    ?>

</div>
