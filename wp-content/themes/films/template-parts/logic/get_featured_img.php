<?php

$imgClasses = ''; // lazyload, lazy

// if (!empty($post->ID)) {
// }

if ( has_post_thumbnail() ) { // $post->ID

	// get thumb ID
	$thumbID = get_post_thumbnail_id(); // $post->ID
	// get all image sizes (custom function in library/responsive-images)
	$img = get_all_image_sizes($thumbID);
	    
} else {

	// get default image in ACF Settings
	$img = get_field('default_image', 'option');

	// if default image not set...
	if (empty($img)) {
		include( get_template_directory() . '/template-parts/logic/default-img.php');
	}

}

include( get_template_directory() . '/template-parts/snippets/img.php');

?>