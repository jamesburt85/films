<?php 

/**
 * Text Block
 * 
 * @param   array $block The block settings and attributes
 * @param   string $content The block inner HTML (empty)
 * @param   bool $is_preview True during AJAX preview
 * @param   (int|string) $post_id The post ID this block is saved to 
 */

if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */

  // ACF DUMP
  $acf_fields = get_fields();
  if (!empty($acf_fields)) {
    // echo "<pre>"; print_r($acf_fields); echo "</pre>";
    // $body_copy = get_field('body_copy');
    $post_content = $acf_fields['post_content'];
    
  }

  // Create class attribute allowing for custom "className" and "align" values.
  $classes = 'block-pcon';
  if ( ! empty( $block['className'] ) ) {
      $classes .= ' ' . $block['className'];
  }
  if ( ! empty( $block['align'] ) ) {
      $classes .= ' align' . $block['align'];
  }
  
?>

<section
  <?php $anchor_link = get_field('anchor_link'); if(!empty($anchor_link)){ echo 'id="'.$anchor_link.'"'; } ?>
  class="<?php echo esc_attr( $classes ); ?>">

      <?php if($post_content):
       include( get_template_directory() . '/template-parts/content/post-content-flex.php');
      endif;?>

</section> 

<?php endif;