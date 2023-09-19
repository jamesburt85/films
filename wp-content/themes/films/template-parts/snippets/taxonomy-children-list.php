<?php
	// Get the current taxonomy term
	$current_term = get_queried_object();

	// Check if the queried object is a term
	if ($current_term instanceof WP_Term) {

		echo '<ul class="category-list">';

			// Display the current term name
			echo '<li class="medium tiny color-grey">' . $current_term->name . '</li>';

			echo '<li class="medium tiny no-underline"><a href="/work/#our-work">All</a></li>';

		    // Check if the current term has children
		    $term_children = get_term_children($current_term->term_id, $current_term->taxonomy);

		    if (!empty($term_children)) {
		        foreach ($term_children as $child_term_id) {
	                $child_term = get_term($child_term_id, $current_term->taxonomy);
	                // Sanitize the child term's slug for use in the URL
	                $child_term_slug = sanitize_title($child_term->slug);
	                echo '<li class="medium tiny no-underline"><a href="' . get_term_link($child_term_slug, $current_term->taxonomy) . '">' . $child_term->name . '</a></li>';
	            }
		    }
		echo '</ul>';
	}
?>