<?php 
	
	// echo "<pre>"; print_r($post_content); echo "</pre>";
	
	// echo "<pre>"; print_r($post_content); echo "</pre>";

	# If there are any fields
	if ( !empty( $post_content )) {
		foreach ($post_content as $content_section):

			// echo "<pre>"; print_r($content_section); echo "</pre>";
			$blockType = $content_section['acf_fc_layout'];

			?>

			<div class="post_content--wrapper">
				<div class="post_content--<?php echo $blockType; ?>">
					<div class="post_content--<?php echo $blockType; ?>-inner-wrapper">

						<?php
							$copy = $content_section['copy'] ?? null;
							$image = $content_section['image'] ?? null;
							// echo "<pre>"; print_r($content_section['acf_fc_layout']); echo "</pre>";
						?>

						<?php if(!empty($copy)):?>
							<div class="post_content-copy-wrapper">
								<?php if ($blockType == 'pullout_copy') { ?>
									<blockquote class="pullout_copy">
								<?php } ?>
							  		<?php echo( $copy ); ?> 
								<?php if ($blockType == 'pullout_copy') { ?>
									</blockquote>
								<?php } ?>
							</div>
						<?php endif; ?>

						<?php if(!empty($image)):?>
							<div class="post_content-image-wrapper">
								
							<?php
								$img = $image;
								include( get_template_directory() . '/template-parts/snippets/img.php');
							?> 
							</div>
						<?php endif; ?>

					</div>
				</div>
			</div>

		<?php endforeach;
	}

?>