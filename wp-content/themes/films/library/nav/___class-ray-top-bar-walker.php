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

if ( ! class_exists( 'Ray_Top_Bar_Walker' ) ) :
	class Ray_Top_Bar_Walker extends Walker_Nav_Menu {

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			// DEFAULT:
			 $object = $item->object;
			 $type = $item->type;
			 $title = $item->title;
			 $description = $item->description;
			 $permalink = $item->url;
			 $classes = $item->classes;

			 // echo "<pre>";
			 // print_r($item);
			 // echo "</pre>";

			 // echo "<pre>";
			 // print_r($classes);
			 // echo "</pre>";
				     
			 if( in_array("menu-item-has-children", $classes)) { // && $permalink == '#' 
		 		// $output .= '<h1>START</h1>';
		 		$output .= "<li class=\"menu-group-container\">";
		 		$output .= "<ul class=\"menu-group " .  implode(" ", $item->classes) . "\">";
		 		$output .= "<li class=\"menu-group-toggle-container\">";

		 		// for accssibility, remove href='#' and use button instead
		 		if ($permalink == '#') {
			 	   	$output .= "<button class=\"menu-group-toggle js-menu-group-toggle\">";
		 		} else {
			 	   	$output .= "<a href=\"" . $permalink . "\" class=\"menu-group-toggle js-menu-group-toggle\">";
		 		}
			 } else {
			 	$output .= "<li class=\"" .  implode(" ", $item->classes) . "\">";
			 	$output .= "<div class=\"menu-btn\">";
			 	$output .= "<a href=\"" . $permalink . "\">";
			 }
			    
			 $output .= $title;

		 	 if( in_array("menu-item-has-children", $classes)) { // && $permalink == '#' 
		 		// for accssibility, remove href='#' and use button instead
		 		if ($permalink == '#') {
			 	   	$output .= "</button>";
		 		} else {
			 	   	$output .= "</a>";
		  		}
		 		$output .= "</li>";
		 	 } else {
		 	 	$output .= "</a>";
		 		$output .= "</div>";
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
			// $indent  = str_repeat( "\t", $depth );
			$output .= "\n<li class=\"nested-menu-container-wrapper nested-menu-container-wrapper__".$depth."\"><div class=\"nested-menu-container nested-menu-container__".$depth."\"><ul class=\"vertical nested menu menu__".$depth." \">\n";
			// $output .= '<li class="nested-menu-inner-wrapper">';
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {		
			// $output .= "</li>";
			$output .= "</ul>";
			$output .= "</div></li>";
			// $output .= "</ul>";
		}
	}
endif;
