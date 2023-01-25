<?php
/**
 * Customize the output of menus for Foundation mobile walker
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/**
 * Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
 */

if ( ! class_exists( 'Ray_Mobile_Walker' ) ) :
	class Ray_Mobile_Walker extends Walker_Nav_Menu {

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			// DEFAULT:
			 $object = $item->object;
			 $type = $item->type;
			 $title = $item->title;
			 $description = $item->description;
			 $permalink = $item->url;
			 $classes = $item->classes;

			 // echo "<pre>";
			 // print_r($classes);
			 // echo "</pre>";

			 // if current-menu-ancestor , add in 'is-open' class.
			 // this allows toggling of menu user is currently navigated to,
			 // so we use is-open to open menu, rather than current-menu class 
			 if( in_array( "current-menu-ancestor", $classes ) )
			 {	
			 	// echo "string";
			    $classes[] = 'is-open';
			 }

				     
			 //Add SPAN if no Permalink
			 if( in_array("menu-item-has-children", $classes)) { // && $permalink == '#' 
				// $output .= '<h1>START</h1>';
				$output .= '<li class="menu-group-container">';
				$output .= '<ul class="menu-group ' .  implode(" ", $classes) . '">';
				$output .= '<li class="menu-group-toggle-container">';
			   	$output .= '<button class="menu-group-toggle js-menu-group-toggle">';
			 } else {
			 	$output .= "<li class='" .  implode(" ", $classes) . "'>";
			 	$output .= '<div class="menu-btn">';
			 	$output .= '<a href="' . $permalink . '">';
			 }
			    
			 $output .= $title;

			 if( in_array("menu-item-has-children", $classes) ) { // && $permalink == '#'
			 	$output .= '</button>';
			 	$output .= '<div class="menu-group-toggle--menu-btn">';
			 	$output .= '<a href="' . $permalink . '">';
			 	$output .= $title;
			 	$output .= '</a>';
			 	$output .= '</div>';
			 	$output .= "</li>";
			 } else {
			 	$output .= '</a></div>';
			 	// $output .= "</li>";
			 }

		}

		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			// DEFAULT:
			 $object = $item->object;
			 $type = $item->type;
			 $title = $item->title;
			 $description = $item->description;
			 $permalink = $item->url;
			 $classes = $item->classes;

			  if( in_array("menu-item-has-children", $classes)) { // && $permalink == '#' 
			 	// $output .= '<h1>START</h1>';

			 	$output .= '</ul>';
				$output .= "</li>";

			  } else {

			  	 $output .= "</li>";

			  }

		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<li><ul class=\"vertical nested menu\">\n";
			// $output .= '<li class="nested-menu-inner-wrapper">';
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {		
			// $output .= '</li>';
			$output .= '</ul></li>';
			// $output .= '</div></div>';
			// $output .= '</ul>';
		}
	}
endif;
