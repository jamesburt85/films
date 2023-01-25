<?php

/*
Template Name: Legal Page
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post(); ?>
		<main class="main-content" id="main">
			<div class="page-content-container">
				<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>
				<?php the_content();?>
			</div>
		</main>
<?php 
endwhile;
endif; 
?>

<?php get_footer(); ?>