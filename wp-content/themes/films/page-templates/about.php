<?php
/*
Template Name: About Page
*/

get_header();

$acf_fields 	= get_fields();

?>

	<article class="entry-content">
		
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			include( get_template_directory() . '/template-parts/content-about.php');
			// get_template_part( 'template-parts/acf' );
			include( get_template_directory() . '/template-parts/acf.php');
		endwhile;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>

	</article>
	
<?php get_footer();
