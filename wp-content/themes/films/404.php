<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();
?>

	<article class="entry-content wrapper">

		<div>
			<header class="page-header alignwide">
				<h2>
					404 - Page Not Found
				</h2>
			</header><!-- .page-header -->

			<div class="error-404 not-found default-max-width">
				<div class="page-content">
					<p>
						Sorry, we can't find the page you were looking for.
					</p>
					<p>
						Please try using the search below, or the navigation at the top of the page.
					</p>
					 
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</div>

	</article>

<?php
get_footer();
