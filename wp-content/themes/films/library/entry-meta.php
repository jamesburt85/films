<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


// global vars gave critical error
// global $PostedCopy;
// // echo $PostedCopy;
// $PostedCopy = 'Posted:';
// $PostedCopy = get_field('posted_copy', 'option');
// // echo $PostedCopy;

// global $InCopy;
// // echo $InCopy;
// $InCopy = 'In:';
// $InCopy = get_field('in_copy', 'option');
// // echo $InCopy;


if ( ! function_exists( 'ray_entry_meta' ) ) :
	function ray_entry_meta() {
		$PostedCopy = 'Posted:';
		$PostedCopy = get_field('posted_copy', 'option');
		/* translators: %1$s: current date, %2$s: current time */
		echo '<div class=\'meta-wrapper card--tags\'><time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( $PostedCopy.' %1$s', 'foundationpress' ), get_the_date('m/d/y') ) . '</time></div>';
		// echo '<p class="byline author">' . __( 'Written by', 'foundationpress' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
	}
endif;

if ( ! function_exists( 'ray_category_meta' ) ) :
	function ray_category_meta() {

		$post_id = get_the_ID();

	    $defaults = array(
	        'orderby'    => 'name',
	        'parent'     => 0,
	        'hide_empty' => 0,
	    );

	    // Use the $args whenever it is provided, otherwise just stick with the defaults
	    $args       = wp_parse_args( $args, $defaults );

	    $categories = wp_get_post_categories( $post_id, $args );

	    // print_r($args);
	    // print_r();

	    if (!empty($categories)) {

	    	// print_r($categories);

	    	// print_r( $categories[0] );

	    	$numOfCats = count($categories);

	    	// print_r( $numOfCats );

	    	$i = 0;

	    	// if theres only one cat, and that cat is uncategorised, skip entirely...
	    	if ( ($numOfCats == 1) && ( $categories[0] == 1 || strtolower( $categories[0]['category_name'] ) == 'uncategorized') ) {

	    		// return;

	    	} else {

	    		$InCopy = 'In:';
	    		$InCopy = get_field('in_copy', 'option');

	    		echo '<div class=\'meta-wrapper card--tags\'><p class="card--tags">'.$InCopy;

		    	foreach ( $categories as $category_ID ) {

		    	    $category      = get_term( $category_ID );
		    	    $category_name = $category->name;

		    	    $i++;

		    	    if ($i >= 2 && $i != $numOfCats) {
		    	    	echo ", ";
		    	    } else {
			    	    echo " ";
		    	    }


		    	    // I dont' like showing the [uncategorized] category
		    	    if ( strtolower( $category_name ) != 'uncategorized' )
		    	    {
		    	        printf( '%2$s',
		    	            esc_url( get_category_link( $category_ID ) ),
		    	            esc_html( $category_name )
		    	        );
		    	    }

		    	}

		    	echo '</p></div>';
		    	
		    }

	    }

	}

endif;

if ( ! function_exists( 'ray_entry_and_category_meta' ) ) :
	function ray_entry_and_category_meta() {

		$PostedCopy = 'Posted:';
		$PostedCopy = get_field('posted_copy', 'option');

		echo "<div class='meta-wrapper card--tags'><p>".$PostedCopy." ";

		// if(ICL_LANGUAGE_CODE == 'en') {
		// 	echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( '%1$s', 'foundationpress' ), get_the_date('m/d/y') ) . '</time> ';
		// } else {
			echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( '%1$s', 'foundationpress' ), get_the_date('d/m/y') ) . '</time> ';
		// }
		/* translators: %1$s: current date, %2$s: current time */
		// echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( '%1$s', 'foundationpress' ), get_the_date('m/d/y') ) . '</time> ';
		// echo '<p class="byline author">' . __( 'Written by', 'foundationpress' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';

		$post_id = get_the_ID();

	    $defaults = array(
	        'orderby'    => 'name',
	        'parent'     => 0,
	        'hide_empty' => 0,
	    );

	    // Use the $args whenever it is provided, otherwise just stick with the defaults
	    $args       = wp_parse_args( $args, $defaults );

	    $categories = wp_get_post_categories( $post_id, $args );

	    $numOfCats = count($categories);

	    // print_r($args);
	    // print_r();

	    if (!empty($categories)) {

		   	// if theres only one cat, and that cat is uncategorised, skip entirely...
		   	if ( ($numOfCats == 1) && ( $categories[0] == 1 || strtolower( $categories[0]['category_name'] ) == 'uncategorized') ) {
		   		
		   		// return;

		   	} else {

		   		$InCopy = 'In:';
		   		$InCopy = get_field('in_copy', 'option');

		    	echo $InCopy;

		    	$numOfCats = count($categories);
		    	$i = 0;

		    	foreach ( $categories as $category_ID ) 
		    	{
		    	    $category      = get_term( $category_ID );
		    	    $category_name = $category->name;

		    	    $i++;

		    	    if ($i >= 2 && $i != $numOfCats) {
		    	    	echo ", ";
		    	    } else {
			    	    echo " ";
		    	    }


		    	    // I dont' like showing the [uncategorized] category
		    	    if ( strtolower( $category_name ) != 'uncategorized' )
		    	    {
		    	        printf( '%2$s',
		    	            esc_url( get_category_link( $category_ID ) ),
		    	            esc_html( $category_name )
		    	        );
		    	    }
		    	}

		    }

	    	// echo '</p>';
	    }

	    echo "</p></div>";


	}

endif;