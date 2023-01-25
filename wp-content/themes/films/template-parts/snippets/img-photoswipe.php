<?php // echo '<pre>'; print_r($img); echo '</pre>';  ?>

<?php if ($img['subtype'] == 'svg+xml') {
  $imgType = 'is-svg';
} ?>

<?php // <!-- using lazysizes.js --> ?>

<!-- <img
  
    data-sizes="auto"
    data-src="<?php // echo $img['sizes']['medium']; ?>"
    data-srcset="<?php // echo $img['sizes']['fp-medium']; ?> 1024w,
    <?php // echo $img['sizes']['fp-large']; ?> 1200w, 
  <?php // echo $img['sizes']['fp-xlarge']; ?> 1920w"
    class="lazyload <?php // echo $imgType; ?> <?php // echo $imgClasses; ?>"
    src="<?php // echo $img['sizes']['medium']; ?>"
/> -->

<a href="<?php echo $img['sizes']['fp-xlarge']; ?>"
  data-pswp-width="<?php echo $img['sizes']['fp-xlarge-width']; ?>" 
  data-pswp-height="<?php echo $img['sizes']['fp-xlarge-height']; ?>" 
  target="_blank">
  <picture>
    <source 
      srcset="<?php echo $img['sizes']['fp-xlarge']; ?>"
      media="(min-width: 1920w)"
    />
    <source 
      srcset="<?php echo $img['sizes']['fp-large']; ?>"
      media="(min-width: 1200w)"
    />
    <source 
      srcset="<?php echo $img['sizes']['fp-medium']; ?>"
      media="(min-width: 1024px)"
    />
    <img 
      src="<?php echo $img['sizes']['fp-small']; ?>"
      alt="<?php echo $img['alt']; ?>"
    />
  </picture>
</a>