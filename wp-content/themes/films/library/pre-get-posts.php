<?php

/**********************************************
 * PRE - GET - POSTS - add CPTs to news page / news queries
 **********************************************/

// add_action( 'pre_get_posts', 'add_case_studies_cpt_to_main_query' );

// function add_case_studies_cpt_to_main_query( $query ) {

//     if ( $query->is_home() && $query->is_main_query() ) {

//         $args =  array('post', 'adstyles_casestudy', 'adstyles_job');

//         $query->set('post_type', $args);
//     }

// }
