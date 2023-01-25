<?php 
	$showCap = false;
	// $caption = $img['caption'];
	// if (!empty($caption)) {
	// 	if ($caption != '') {
	// 		$showCap = true;
	// 	}
	// }
?>

<?php if (!empty($img)) { ?>

	<div class="lazyload featured-image wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.3s" <?php // lazyload lazypreload ?>
		data-bg-mobile 	= "<?php echo $img['sizes']['fp-small']; ?>"
		
		
		<?php if ($thumbSizes) : ?>

			data-bg-tablet 	= "<?php echo $img['sizes']['fp-small']; ?>"
			data-bg-desktop = "<?php echo $img['sizes']['fp-small']; ?>"
			data-bg-super 	= "<?php echo $img['sizes']['fp-small']; ?>"

			<?php $thumbSizes = null;  ?>

		<?php else: ?>

			data-bg-tablet 	= "<?php echo $img['sizes']['fp-large']; ?>"
			data-bg-desktop = "<?php echo $img['sizes']['fp-large']; ?>"
			data-bg-super 	= "<?php echo $img['sizes']['fp-xlarge']; ?>"
			
		<?php endif; ?>
		data-expand="700"
		style="background-image: url('<?php echo $img['sizes']['fp-small']; ?>');"
	>
		<?php if ($showCap): ?>
			<p class="img-caption"><?php echo $caption; ?></p>
		<?php endif ?>
	</div>

<?php } else { ?>

	<div class="lazyload featured-image" <?php // lazyload lazypreload ?>
		data-bg-mobile 	= "<?php echo get_template_directory_uri(); ?>/dist/images/default.jpg"
		data-bg-tablet 	= "<?php echo get_template_directory_uri(); ?>/dist/images/default.jpg"
		data-bg-desktop = "<?php echo get_template_directory_uri(); ?>/dist/images/default.jpg"
		data-bg-super 	= "<?php echo get_template_directory_uri(); ?>/dist/images/default.jpg"
		data-expand="700"
	>
		<?php if ($showCap): ?>
			<p class="img-caption"><?php echo $caption; ?></p>
		<?php endif ?>
	</div>

<?php } ?>

<!-- <pre>	 -->
<?php //print_r($img['url']); ?>
<!-- </pre> -->