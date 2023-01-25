<?php
	// ACF DUMP
	// echo "<pre>"; print_r($section); echo "</pre>";
?>

<?php  
	$gallery 	= $section['image_gallery'];
?>


<?php if(!empty($gallery)): ?>

	<?php foreach ($gallery as $img): ?>

		<?php include( get_template_directory() . '/template-parts/snippets/img.php'); ?>
		
	<?php endforeach ?>
	
<?php endif; ?>
