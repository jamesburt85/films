<?php if($video_url):?>

  <?php if ($videoType == 'vimeo'): ?>
    <div class="iframe-wrapper">
      <h1>vimeo</h1>
      <iframe class="vimeoPlayer" src="https://player.vimeo.com/video/<?php echo $vimID; ?>" frameborder="0"></iframe>
    </div>
  <?php endif; ?>

  <?php // YOUTUBE ?>
  <?php if ($videoType == 'youtube'): ?>
    <div class="iframe-wrapper">
      <iframe class="ytplayer" type="text/html"
        src="https://www.youtube.com/embed/<?php echo $YtID; ?>?rel=0&showinfo=0"
        frameborder="0" allowfullscreen></iframe>
    </div>
  <?php endif; ?>
  
<?php endif;?>