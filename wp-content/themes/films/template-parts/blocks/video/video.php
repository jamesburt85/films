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
  // echo "<pre>"; print_r($acf_fields); echo "</pre>";
  
  $video_url = $acf_fields['video_url'] ?? null;
  if (!empty($video_url)) {
    $videoType  = getVideoType($video_url);
    
    if ($videoType == 'vimeo') {
      $vimID      = getVimeoID($video_url);
    } elseif ($videoType == 'youtube'){
      $YtID       = getYouTubeID($video_url);
    }
  }  

  // Create class attribute allowing for custom "className" and "align" values.
  $classes = 'block-video';
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

      <?php if(!empty($video_url)):?>

        <?php if ($videoType == 'vimeo'): ?>
          <div class="iframe-wrapper [ responsive-video ]">
            <iframe class="vimeoPlayer" src="https://player.vimeo.com/video/<?php echo $vimID; ?>" frameborder="0"></iframe>
          </div>
        <?php endif; ?>

        <?php // YOUTUBE ?>
        <?php if ($videoType == 'youtube'): ?>
          <div class="iframe-wrapper [ responsive-video ]">
            <iframe class="ytplayer" type="text/html"
              src="https://www.youtube.com/embed/<?php echo $YtID; ?>?rel=0&showinfo=0"
              frameborder="0" allowfullscreen></iframe>
          </div>
        <?php endif; ?>
        
      <?php endif;?>

</section> 

<?php endif;