<?php 

	$num_posts = 3;

	# Use WP's badass funtion to return an array of slugs
	$tax = 'category';
	$terms = get_the_terms( get_the_id(), $tax);
	// echo "<pre>";
	// print_r($terms);
	// echo "</pre>";
	$term1 = $terms[0];
	// echo "<pre>";
	// print_r($term1);
	// echo "</pre>";
	// $term1 = get_the_terms( $post->ID, $categories[0] );
	$term = $term1->slug;
	// $term = wp_list_pluck( $term1, 'slug' );
	// echo "<pre>";
	// print_r($term);
	// echo "</pre>";
	$num_posts = 3;

	// print_r($term);

	# Build the query args
	$args = array(
	    'post_type' => $post_type,
	    'posts_per_page' => $num_posts,
	    // 'post_status' => 'publish',
	    'post__not_in' => array(get_the_id()),
	    // 'orderby' => 'rand',
	    'suppress_filters' => true,
	    'tax_query' => array(
	        array(
	            'taxonomy' => $tax,
	            'field' => 'slug',
	            'terms' => $term
	        )
	    ),
	);

	// echo "<pre>";
	// print_r($args);
	// echo "</pre>";

	$postsFound = get_posts( $args );
	// echo '<h2>postsFound </h2><pre>'.$postsFound.'</pre>';
	$postsCount = count($postsFound);
	// echo '<h2>postsCount </h2><pre>'.$postsCount.'</pre>';
	$postsToGet = $num_posts - $postsCount;
	// echo '<h2>postsToGet </h2><pre>'.$postsToGet.'</pre>';

	if ($postsCount < $num_posts) {

		$post_ids_already_got = wp_list_pluck( $postsFound->posts, 'ID' );

		$allIDsToAvoid = array_merge($post_ids_already_got, array(get_the_id()));

		$args2 = array(
		    'post_type' => $post_type,
		    'posts_per_page' => $postsToGet,
		    // 'post_status' => 'publish',
		    'post__not_in' => $allIDsToAvoid,
		    'orderby' => 'rand',
		    'suppress_filters' => true,
		    // 'tax_query' => array(
		    //     array(
		    //         'taxonomy' => $tax,
		    //         'field' => 'slug',
		    //         'terms' => $term
		    //     )
		    // ),
		);
	}

	// print_r($IDs);

	// $args = array(
	//     'post_type' 		=> $post_type,
	//     'post_status' 		=> 'publish',
	//     'post__in' 			=> $IDs,
	//     'orderby' 			=> 'post__in',
	//     'post__not_in' 		=> array(get_the_id()),
	// );

?>