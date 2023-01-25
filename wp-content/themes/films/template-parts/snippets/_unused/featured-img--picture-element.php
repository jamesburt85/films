<?php 
	$showCap = false;
	// $caption = $img['caption'];
	// if (!empty($caption)) {
	// 	if ($caption != '') {
	// 		$showCap = true;
	// 	}
	// }

	$image_aspect_ratio = ($img['height'] / $img['width']);
	// echo $image_aspect_ratio;
	// padding-top: calc(591.44 / 1127.34 * 100%);
?>

<picture class="picture-with-ratio wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.3s" style="padding-top: calc(<?php echo $image_aspect_ratio ?> * 100%);" data-width="<?php echo $img['width']; ?>" data-height="<?php echo $img['height']; ?>">
    <img
    	src="<?php echo $img['sizes']['fp-medium']; ?>"
		data-sizes="auto"
		data-srcset="<?php echo $img['sizes']['fp-medium']; ?> 300w,
	    <?php echo $img['sizes']['fp-large']; ?> 600w,
	    <?php echo $img['sizes']['fp-xlarge']; ?> 900w"
		data-src="<?php echo $img['sizes']['fp-xlarge']; ?>"
		class="lazyload"
		alt="<?php echo $img['alt']; ?>"
		>
	<?php if ($showCap): ?>
		<p class="img-caption"><?php echo $caption; ?></p>
	<?php endif ?>
</picture>