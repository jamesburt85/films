<article id="post-<?php the_ID(); ?>" <?php post_class($cardClasses); ?>>
	<div class="card--content-wrapper">
		<div class="card--content">

			<div class="card--image">	
				<a href="<?php the_permalink() ?>">
					<?php include( get_template_directory() . '/template-parts/logic/get-featured-img.php'); ?>
					<?php // include( get_template_directory() . '/template-parts/snippets/img.php'); ?>
				</a>
			</div>

			<div class="card--copy">
				
				<div class="card--copy--top-section">

				<?php if(!empty($webinar_date_and_time)):?>
					<div class="webinar_date_and_time">			
					  <?php get_template_part('svg/inline', 'icon-cal.svg'); ?>
					  <?php if ($show_time) { ?>
					  	<h4 class="webinar_date_and_time--copy"><?php echo esc_html( $webinar_date_and_time ); ?></h4>
					  		<?php if(!empty($timezone_display)):?>
					  	  	<p class="timezone_display"><?php echo esc_html( $timezone_display ); ?></p>
					  		<?php endif; ?>
						<?php } else {
							$dt = new DateTime($webinar_date_and_time);
							$webinar_date_and_time = $dt->format('F j, Y');
						?>
					  	<h4 class="webinar_date_and_time--copy"><?php echo esc_html( $webinar_date_and_time ); ?></h4>
					  <?php } ?>
						
					</div>
				<?php endif; ?>

				<?php // if(!empty($webinar_date_and_time)):?>
					<!-- <div class="webinar_date_and_time">			
					  <?php // get_template_part('svg/inline', 'icon-cal.svg'); ?><h4 class="webinar_date_and_time--copy"><?php // echo esc_html( $webinar_date_and_time ); ?></h4>
						<?php // if(!empty($timezone_display)):?>
					  	<p class="timezone_display"><?php // echo esc_html( $timezone_display ); ?></p>
						<?php // endif; ?>
					</div> -->
				<?php // endif; ?>

				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>

				<?php if(!empty($card_intro)):?>
				  <div class="card--intro"><p><?php echo $card_intro; ?></p></div> 

				<?php endif; ?>

				<?php if(!empty($select_profiles)):
					// echo "<pre>";
					// print_r($select_profiles);
					// echo "</pre>";
					?>
					
					<div class="card--profile-grid">
						<?php
							$numPosts = 3;
							include( get_template_directory() . '/template-parts/snippets/select_profiles.php');
						?>
					</div>

				<?php endif; ?>

				
					
				</div>

				<div class="card--copy--bottom-section">

					<?php if (!empty($post_author)) { ?>
						
						<div class="card--profile-grid">

							<?php include( get_template_directory() . '/template-parts/snippets/get-post-author-card.php'); ?>

						</div>

					<?php } ?>

					<?php // ray_entry_meta(); ?>
					<?php // ray_category_meta(); ?>
					<?php ray_entry_and_category_meta(); ?>

					<?php if(!empty($card_button_copy)):?>
						<a href="<?php the_permalink() ?>" class="button card--button">
							<?php echo $card_button_copy; ?>
							<?php get_template_part('svg/inline', 'icon-arrow-right.svg'); ?>
						</a>
					<?php endif; ?>

				</div>

			</div>

		</div>
	</div>
</article>

<?php
	// reset vars used in snippet
	$cardClasses 				= null;
	$webinar_date_and_time 		= null;
	$card_intro 				= null;
	$timezone_display 			= null;
	$select_profiles 			= null;
	$post_author 				= null;
	$card_button_copy 			= null;
?>
