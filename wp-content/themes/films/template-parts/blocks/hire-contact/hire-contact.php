<?php
/**
 * Block template file: hire-contact.php
 *
 * hire-contact Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// echo "<pre>"; print_r($block); echo "</pre>";

# set vars from acf
$title  = get_field( 'title' ) ?? null;
$copy   = get_field( 'copy' ) ?? null;
$block  = get_field( 'block' ) ?? null;
$copy   = get_field( 'copy' ) ?? null;

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-hire-contact';
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

<div class="<?php echo esc_attr( $classes ); ?> [ wrapper ] fade-in-up">
  
  <div class="borders--top borders--bottom flow">
    
    <?php if ( $title ) : ?>
        <h2 class="section-header"><?php echo $title; ?></h2>
    <?php endif; ?>

    <?php if ( $block ) :
    ?>

    <div class="flow--small">

      <?php foreach ($block as $b):

          $title        = $b['title'];
          $phone_number = $b['phone_number'];
          $email        = $b['email']; ?>
          
          <div class="">
            
            <div class="flow--medium">
              
              <div class="flex flex-space-between flex-thirds">
                  <div>
                    <?php echo $title; ?>
                  </div>
                  <div>
                    <?php echo $phone_number; ?>
                  </div>
                  <div>
                    <a class="highlighted" href="mailto:<?php echo $email; ?>">
                      <?php echo $email; ?>
                    </a>
                  </div>
              </div>

            </div>  
          </div>

        <?php endforeach; ?>

        </div>

      <?php endif; ?>

      <?php
        if ( $copy ) {
      ?>
        <div class="tiny medium">
          <?php echo $copy; ?>
        </div>
      <?php
        }
      ?>
  </div>
  
</div>
