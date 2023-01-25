<?php
/**
 */

?>

<div class="card__basic card__<?php echo $brand_colours; ?>">

  <?php if(!empty($basic_card_image)): ?>
    <div class="card--image">
      <div class="card--image--inner-wrapper">
        <?php $img = $basic_card_image;
        include( get_template_directory() . '/template-parts/snippets/img.php'); ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="card--copy">
    <div class="card--copy-wrapper">
      <?php if(!empty($basic_card_heading)):?>
        <h3 class="basic_card_heading"><?php echo esc_html( $basic_card_heading ); ?></h3> 
      <?php endif; ?>

      <?php if(!empty($basic_card_copy)):?>
        <p class="basic_card_copy"><?php echo esc_html( $basic_card_copy ); ?></p> 
      <?php endif; ?>
    </div>

    <?php if(!empty($basic_card_button)):
      $link  = $basic_card_button;
      include( get_template_directory() . '/template-parts/snippets/link__button.php');
    endif; ?>
  </div>

</div>