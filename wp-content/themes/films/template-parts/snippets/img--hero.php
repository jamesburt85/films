<?php // echo '<pre>'; print_r($img); echo '</pre>';  ?>

<?php 
  if (isset($img['subtype'])) {
    if ($img['subtype'] == 'svg+xml') {
     $imgType = 'is-svg';
    }
  }
?>

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

<?php if (isset($img['sizes'])) { ?>

  <picture>
    <source 
      srcset="<?php echo $img['sizes']['fp-small']; ?>"
      media="(min-width: 1920px)"
    />
    <source 
      srcset="<?php echo $img['sizes']['fp-small']; ?>"
      media="(min-width: 1200px)"
    />
    <source 
      srcset="<?php echo $img['sizes']['fp-small']; ?>"
      media="(min-width: 1024px)"
    />
    <img 
      src="<?php echo $img['sizes']['fp-small']; ?>"
      alt="<?php echo $img['alt']; ?>"
    />
  </picture>

<?php } ?>