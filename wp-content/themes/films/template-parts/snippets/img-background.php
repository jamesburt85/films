<?php // echo '<pre>'; print_r($img); echo '</pre>';  ?>

<?php // <!-- using lazysizes.js --> ?>
<div class="lazyload background-image" <?php // lazypreload ?>
	data-bg-mobile 	= "<?php echo $img['sizes']['large']; ?>"
	data-bg-tablet 	= "<?php echo $img['sizes']['fp-large']; ?>"
	data-bg-desktop = "<?php echo $img['sizes']['fp-xlarge']; ?>"
	data-bg-super 	= "<?php echo $img['sizes']['fp-xlarge']; ?>"
	data-expand="700"
	style="background-image: url('<?php echo $img['sizes']['large']; ?>');"
></div>