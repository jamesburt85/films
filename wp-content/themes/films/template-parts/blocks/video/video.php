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
  $title     = $acf_fields['title'] ?? null;
  $video_url = $acf_fields['video_url'] ?? null;
  $id        = $acf_fields[ 'id' ]; 

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

<!-- <section
  <?php $anchor_link //= get_field('anchor_link'); if(!empty($anchor_link)){ echo 'id="'.$anchor_link.'"'; } ?>
  class="<?php //echo esc_attr( $classes ); ?> wrapper [ flow ]"> -->
<section id="<?php echo $id; ?>"
  class="<?php echo esc_attr( $classes ); ?> [ flow ]">

    <?php
      if ( $title ) {
    ?>
        <div class="wrapper fade-in-up">
          <h2 class="section-header">
            <?php echo $title; ?>
          </h2>
        </div>
    <?php
      }
    ?>
    
    <div class="video--wrapper [ flow--small ] fade-in-up">

      <img src="https://vumbnail.com/<?php echo $video_url; ?>.jpg" />

      <div class="button--play__wrapper">
        <a class="popup-vimeo no-underline button--play bg-primary-shade" href="https://player.vimeo.com/video/<?php echo $video_url; ?>">
          <?php get_template_part('dist/svg_php/inline', 'icon-play.svg'); ?>
        </a>
      </div>

      <?php
        if ( get_field('video_title') ) {
      ?>
          <p class="tiny medium color-grey video--title">
            <?php the_field('video_title'); ?>
          </p>
      <?php
        }
      ?>

    </div>

</section> 

<?php endif;