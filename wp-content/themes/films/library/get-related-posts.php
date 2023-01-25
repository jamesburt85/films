<?php

# Function to return related posts 
function adstyles_get_related_posts( $post = null, $num_posts = 2, $categories ) {

    # Die early if no post
    if( empty( $post )) return false;

    $thePostID = $post->ID;
    // var_dump($thePostID);

    // var_dump($categories);
    $related_posts = array();
    # setup rules according to num of cats being tested..
    $numOfCats = count($categories);
    // print_r($numOfCats);

    if($numOfCats == 3) {
	    $rules = [
	    	[$categories[0],$categories[1],$categories[2]],
	    	[$categories[0],$categories[1]],
	    	[$categories[0],$categories[2]],
	    	[$categories[1],$categories[2]],
	    	[$categories[0]],
	    	[$categories[1]],
	    	[$categories[2]]
	    ];
    } else if($numOfCats == 2) {
	    $rules = [
	    	[$categories[0],$categories[1]],
	    	[$categories[0]],
	    	[$categories[1]]
	    ];
    } else {
	    $rules = [
	    	[$categories[0]]
	    ];
	}
	
	// go through each rule
	foreach($rules as $rule) {

    	$numOfTermsToCheck = count($rule);
    	// print_r($numOfTermsToCheck);

    	// if three vars to check
    	if($numOfTermsToCheck == 3) {

	    	# Get the post terms
	    	$term1 = get_the_terms( $post->ID, $rule[0] );
	    	$term2 = get_the_terms( $post->ID, $rule[1] );
	    	$term3 = get_the_terms( $post->ID, $rule[2] );

	    	if( !empty( $term1 )  && !empty( $term2 ) && !empty( $term3 ) ){
	
		    	# Use WP's badass funtion to return an array of slugs
		    	$term1_list = wp_list_pluck( $term1, 'slug' );
		    	$term2_list = wp_list_pluck( $term2, 'slug' );
		    	$term3_list = wp_list_pluck( $term3, 'slug' );

		    	# Build the query args
		    	$related_args = array(
		    	    'post_type' => $post->post_type,
		    	    'posts_per_page' => $num_posts,
		    	    'post_status' => 'publish',
		    	    'post__not_in' => array($thePostID),
		    	    'orderby' => 'rand',
		    	    'tax_query' => array(
		    	    	'relation' => 'AND',
		    	        array(
		    	            'taxonomy' => $rule[0],
		    	            'field' => 'slug',
		    	            'terms' => $term1_list
		    	        ),
		    	        array(
		    	            'taxonomy' => $rule[1],
		    	            'field' => 'slug',
		    	            'terms' => $term2_list
		    	        ),
		    	        array(
		    	            'taxonomy' => $rule[2],
		    	            'field' => 'slug',
		    	            'terms' => $term3_list
		    	        )
		    	    ),
		    	);

		    	$postsFound = get_posts( $related_args );
		    	$postsCount = count($postsFound);

    	    	// see if results are in main array already (added in prev loop)
    	    	foreach($postsFound as $post) {
    	    		// $tempArray = array(); // add to temp array
    		    	if (!in_array($post, $related_posts)) {
    			    	array_push($related_posts, $post);
    		    	}
    		    }

		    }

		    if (count($related_posts) >= $num_posts) {
		    	return $related_posts;
		    } 

    	}

    	// if two vars to check
    	if($numOfTermsToCheck == 2) {

	    	# Get the post terms
	    	$term1 = get_the_terms( $post->ID, $rule[0] );
	    	$term2 = get_the_terms( $post->ID, $rule[1] );

	    	if( !empty( $term1 )  && !empty( $term2 ) ){
	
		    	# Use WP's badass funtion to return an array of slugs
		    	$term1_list = wp_list_pluck( $term1, 'slug' );
		    	$term2_list = wp_list_pluck( $term2, 'slug' );

		    	# Build the query args
		    	$related_args = array(
		    	    'post_type' => $post->post_type,
		    	    'posts_per_page' => $num_posts,
		    	    'post_status' => 'publish',
		    	    'post__not_in' => array($thePostID),
		    	    'orderby' => 'rand',
		    	    'tax_query' => array(
		    	    	'relation' => 'AND',
		    	        array(
		    	            'taxonomy' => $rule[0],
		    	            'field' => 'slug',
		    	            'terms' => $term1_list
		    	        ),
		    	        array(
		    	            'taxonomy' => $rule[1],
		    	            'field' => 'slug',
		    	            'terms' => $term2_list
		    	        )
		    	    ),
		    	);

		    	$postsFound = get_posts( $related_args );
		    	$postsCount = count($postsFound);

    	    	// see if results are in main array already (added in prev loop)
    	    	foreach($postsFound as $post) {
    		    	if (!in_array($post, $related_posts)) {
    			    	array_push($related_posts, $post);
    		    	}
    		    }

		    }

		    if (count($related_posts) >= $num_posts) {
		    	return $related_posts;
		    } 

    	}

    	// if one vars to check
    	if($numOfTermsToCheck == 1) {

	    	# Get the post terms
	    	$term1 = get_the_terms( $post->ID, $rule[0] );
	    	// print_r($term1);

	    	if( !empty( $term1 ) ){

		    	# Use WP's badass funtion to return an array of slugs
		    	$term1_list = wp_list_pluck( $term1, 'slug' );

		    	// print_r($term1_list);

		    	# Build the query args
		    	$related_args = array(
		    	    'post_type' => $post->post_type,
		    	    'posts_per_page' => $num_posts,
		    	    'post_status' => 'publish',
		    	    'post__not_in' => array($thePostID),
		    	    'orderby' => 'rand',
		    	    'tax_query' => array(
		    	        array(
		    	            'taxonomy' => $rule[0],
		    	            'field' => 'slug',
		    	            'terms' => $term1_list
		    	        )
		    	    ),
		    	);

		    	$postsFound = get_posts( $related_args );
		    	$postsCount = count($postsFound);

		    	// see if results are in main array already (added in prev loop)
    	    	foreach($postsFound as $post) {
    		    	if (!in_array($post, $related_posts)) {
    			    	array_push($related_posts, $post);
    		    	}
    		    }

		    }

		    if (count($related_posts) >= $num_posts) {
		    	return $related_posts;
		    } 

    	}

	}

	return $related_posts;

}