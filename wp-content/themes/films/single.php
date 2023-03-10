<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="hero-image">	
		<?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>
	</div>

	
	
	<article class="entry-content">
			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

			<div class="wrapper">
				
			<?php 
				if (get_post_type() == 'post') { ?>
					<a href="<?php echo get_post_type_archive_link( 'post' ); ?>">Back to Latest</a>
				<?php } elseif (get_post_type() == 'kit') { ?>
					<a href="<?php echo get_post_type_archive_link( 'kit' ); ?>">Back to Kit</a>
				<?php } elseif (get_post_type() == 'people') { ?>
					<a href="<?php echo get_post_type_archive_link( 'people' ); ?>">Back to People</a>
				<?php }
			?>
			
			</div>

			<div class="wrapper">
				<h1><?php the_title(); ?></h1>
			</div>

			<?php if (get_post_type() == 'kit') { ?>

				<div class="[ flow ] [ category-cards ] wrapper">
					<?php
						//if (is_post_type_archive('work')) {
							include( get_template_directory() . '/template-parts/snippets/category-list.php');
						// } elseif (is_post_type_archive('service_cpt')) {
						// 	$showTax = 'service_cpt';
						// 	include( get_template_directory() . '/template-parts/snippets/category-list.php');
						//}
					?>
				</div>

			<?php } ?>

			<div class="wrapper flow">

				<?php the_content();?>

			</div>
			
			<?php // include( get_template_directory() . '/template-parts/snippets/share-bar.php'); ?>

			<?php if (get_post_type() == 'kit') { ?>

				<div class="with-sidebar wrapper">
					<div class="sidebar">
						<h1>Our Kit</h1>
						<p>Our state-of-the-art kit room and highly skilled experts are dedicated to discovering the ultimate kit for your shoot, ensuring an unparalleled result.</p>
					</div>
					<div class="not-sidebar">
						<?php include( get_template_directory() . '/template-parts/snippets/kit-contact.php'); ?>
					</div>
				</div>

				<div>

				</div>
			<?php } ?>

			<?php 
				if (get_post_type() == 'post') {
					include( get_template_directory() . '/template-parts/snippets/related_posts.php');
				}
			?>

	</article>

	

<?php 
endwhile;
endif; 
?>
<?php get_footer(); ?>