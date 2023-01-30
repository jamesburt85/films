<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article class="entry-content wrapper">
			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>

			<?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?>

			<h1><?php the_title(); ?></h1>
			
			<?php
				$terms = get_the_terms( $post->ID, 'people_category' );
				foreach ( $terms as $term ) {
			?>
					<p>
						<?php echo $term->name; ?>
					</p>
			<?php
		        }
			?>
			
			<?php the_content();?>
			
			<?php include( get_template_directory() . '/template-parts/snippets/share-bar.php'); ?>
	</article>

<?php 
endwhile;
endif; 
?>
<?php get_footer(); ?>