<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article class="entry-content wrapper">
			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

			<?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>

			<h1><?php the_title(); ?></h1>
			<?php the_content();?>
			
			<?php // include( get_template_directory() . '/template-parts/snippets/share-bar.php'); ?>

			<?php if (get_post_type() == 'kit') { ?>

				<div class="with-sidebar">
					<div class="sidebar">
						<h1>Our Kit</h1>
						<p>Our state-of-the-art kit room and highly skilled experts are dedicated to discovering the ultimate kit for your shoot, ensuring an unparalleled result.</p>
					</div>
					<div class="not-sidebar">
						<!-- <img src="https://picsum.photos/900/<?php echo rand(500, 700); ?>?random=1&grayscale&blur=5"> -->
						<h2>Our team of experts are ready to help find the perfect kit for your shoot</h2>
						<?php gravity_form( 1, false, false, false, '', false ); ?>
					</div>
				</div>

				<div>

				</div>
			<?php } ?>

	</article>

	

<?php 
endwhile;
endif; 
?>
<?php get_footer(); ?>