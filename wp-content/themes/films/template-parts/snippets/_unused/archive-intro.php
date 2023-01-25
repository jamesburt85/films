<?php 
	// echo "<pre>"; print_r($acf_fields); echo "</pre>";
	$title			= $acf_fields['archive_title'];
	$subtitle		= $acf_fields['archive_copy'];
?>


<div class="archive-intro">

	<div class="archive-intro--layout">

		<div class="archive-intro--intro">
			
			<?php if(!empty($title)): ?>
				<h2 class="title type-heading"><?php echo $title ?></h2>
			<?php endif; ?>

			<?php if(!empty($subtitle)): ?>
				<p class="subtitle type-subtitle"><?php echo $subtitle ?></p>
			<?php endif; ?>
		
		</div>

	</div>


</div>