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

			 

			 // if( in_array('divider-start', $classes ) ) {
			 // 	// do start wrap
			 // 	// $output .= '<li class="sub-menu-column-wrapper"><ul class="sub-menu-column">';
			 // } else if( in_array('divider-end', $classes ) ) {
			 // 	// do end wrap
			 // 	// $output .= '</ul></li>';
			 // } else {
				     
			 //Add SPAN if no Permalink
			 if( $permalink && $permalink != '#' ) {
			 	$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
			 	$output .= '<div class="menu-btn"><a href="' . $permalink . '">';
			 } else {
				// $output .= '<h1>START</h1>';
				$output .= '<li class="menu-group-container"><ul class="menu-group' .  implode(" ", $item->classes) . '"><li class="menu-group-toggle-container">';
			   	$output .= '<button class="menu-group-toggle js-menu-group-toggle">';
			 }
			    
			 $output .= $title;

			 // if( $description != '' && $depth == 0 ) {
			 // 	$output .= '<small class="description">' . $description . '</small>';
			 // }

			 if( $permalink && $permalink != '#' ) {
			 	$output .= '</a></div>';
			 	$output .= "</li>";
			 } else {
			 	$output .= '</button>';
			 	$output .= "</li>";
			 }

			 

			// AD ADDED:
			// $this->curItem = $item;

			// }
		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
			// $output .= '<li class="nested-menu-inner-wrapper">';
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {		
			$output .= '</li>';
			$output .= '</ul>';
			$output .= '</ul>';
		}
	}
endif;
