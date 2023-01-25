<?php 

	global $post;
	$current_post = $post; // remember the current post

	$IDs = array();

	for($i = 1; $i <= 3; $i++){
	  $post = get_previous_post(); // this uses $post->ID
	  setup_postdata($post);
	  // if post present
	  if ($post) {
	  	$IDs[] = get_the_id();
	  } else { // else, if no post, start again in list and get first post
	  	// $post = get_posts(); // 'post_type' => $post_type, 'numberposts' => 1, 
	  	$firstPostQuery = array('post_type' => $post_type, 'numberposts' => 1);
	  	$test = get_posts($firstPostQuery); // 'post_type' => $post_type, 'numberposts' => 1, 
	  	$post = $test[0];
	  	$IDs[] = get_the_id();
	  	// print_r($post);
	  }
	  // do your stuff here
	  
	}

	$post = $current_post; // restore
	
	// print_r($IDs);

	// print_r($post->ID);

	// see if current ID is in the $IDs array. If so, remove all instances of it
	foreach (array_keys($IDs, $post->ID) as $key) {
	    unset($IDs[$key]);
	}

	// print_r($IDs);


	

	$args = array(
	    'post_type' 		=> $post_type,
	    'post_status' 		=> 'publish',
	    'post__in' 			=> $IDs,
	    'orderby' 			=> 'post__in',
	    // 'post__not_in' 		=> array( $post->ID ),
	);

?>