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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> [ wrapper ] fade-in-up">
  
  <?php if ( $title ) : ?>
      <h1><?php echo $title; ?></h1>
  <?php endif; ?>

  <?php if ( $copy ) : ?>
      <p><?php echo $copy; ?></p>
  <?php endif; ?>

  <?php if ( $testimonials ) :
  ?>

    <div class="[ card-grid ] three-columns">

  <?php foreach ($testimonials as $t):

      $img          = $t['logo'];
      $quote          = $t['quote'];
      $quote_author   = $t['quote_author']; ?>
      
      <div class="card">
        
        <blockquote class="flow--medium">
          <?php if ( $img ) { ?>
            <div class="blockquote--image">
              <?php
                include( get_template_directory() . '/template-parts/snippets/img.php');
              ?>
            </div>
          <?php } ?>
          
          <div class="flex">

            <div class="quote--marks">
                <?php get_template_part('dist/svg_php/inline', 'speech.svg'); ?>
            </div>

            <div class="flow--medium">
              <div>
                <?php echo $quote; ?>
              </div>
              
              <div>
                <figcaption class="tiny medium">
                  <?php echo $quote_author; ?>
                </figcaption>
              </div>
            </div>

          </div>

        </blockquote>  
      </div>

    <?php endforeach; ?>

    </div>

  <?php endif; ?>

  <?php if ( $ctas ) :
    foreach ($ctas as $link):
      $link = $link['cta'];
      include( get_template_directory() . '/template-parts/snippets/link__button.php');
    endforeach;
  endif; ?>

</div>
