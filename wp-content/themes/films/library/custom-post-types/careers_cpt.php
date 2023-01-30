<?php

/*
 ** Register Custom Post Type for profile posts
*/

function cpt_careers() {

    // creating (registering) the custom type (http://codex.wordpress.org/Function_Reference/register_post_type)
    register_post_type('careers',

    // let's now add all the options for this post type
    array(
        'labels' => array(
            'name' => __('Careers', 'post type general name') ,

            /* This is the Title of the Group */
            'singular_name' => __('Careers', 'post type singular name') ,

            /* This is the individual type */
            'add_new' => __('Add New Careers', 'custom post type item') ,

            /* The add new menu item */
            'add_new_item' => __('Add New Careers') ,

            /* Add New Display Title */
            'edit' => __('Edit') ,

            /* Edit Dialog */
            'edit_item' => __('Edit Careers') ,

            /* Edit Display Title */
            'new_item' => __('New Careers') ,

            /* New Display Title */
            'view_item' => __('View Careers') ,

            /* View Display Title */
            'search_items' => __('Search Careers') ,

            /* Search Custom Type Title */
            'not_found' => __('Nothing found in the Database.') ,

            /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash') ,

            /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ) ,

        /* end of arrays */
        'description' => __('This is the Careers Section') ,

        /* Custom Type Description */
        'hierarchical'        => true,
        // 'hierarchical'        => true,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        // 'taxonomies'  => array( 'category' ),
        'has_archive'         => true,
        'show_ui'             => true,
        'query_var'           => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-networking',
        // 'rewrite'             => array(
        //     'slug' => 'careers',
        //     'with_front' => false
        // ) ,
        'capability_type'     => 'post',
        'show_in_rest'        => false, // gutenberg
        'supports'            => array(
            'title',
            'thumbnail',
            'revisions',
            'editor',
            // 'author'
            // 'comments',
            // 'excerpt',
            // 'page-attributes',
        ) ,
    )

    /* end of options */);

    /* end of register post type */



    // register_taxonomy('people_category', 'people', array(
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_nav_menus' => true,
    //     'show_admin_column' => true,
    //     'hierarchical' => false,
    //     'label' => __("People Category", 'tcc_theme') ,
    //     'query_var' => true,
    //     'show_tagcloud' => true,
    //     'rewrite' => array(
    //         'slug' => 'people-category',
    //         'with_front' => false,
    //         'hierarchical' => true
    //     ) ,
    // ));


}

// adding the function to the Wordpress init
add_action('init', 'cpt_careers');




