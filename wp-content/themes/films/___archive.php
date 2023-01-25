<?php get_header(); ?>
	<main class="main-content" id="main">
		<div class="entry-content">			
			<?php while ( have_posts() ) : the_post(); ?>		
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div>
	</main>
<?php get_footer(); ?>


