<?php

/*
Template Name: PAGE REDIRECT to first child
*/

$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($pagekids) {
	// go to child page
	$firstchild = $pagekids[0];
	wp_redirect(get_permalink($firstchild->ID));
} else {
	// go home
	wp_redirect( home_url() );
}
