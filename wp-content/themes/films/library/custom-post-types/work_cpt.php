<?php

/*
 ** Register Custom Post Type for profile posts
*/

function work() {

    // creating (registering) the custom type (http://codex.wordpress.org/Function_Reference/register_post_type)
    register_post_type('work',

    // let's now add all the options for this post type
    array(
        'labels' => array(
            'name' => __('Work', 'post type general name') ,

            /* This is the Title of the Group */
            'singular_name' => __('Work', 'post type singular name') ,

            /* This is the individual type */
            'add_new' => __('Add New Work', 'custom post type item') ,

            /* The add new menu item */
            'add_new_item' => __('Add New Work') ,

            /* Add New Display Title */
            'edit' => __('Edit') ,

            /* Edit Dialog */
            'edit_item' => __('Edit Work') ,

            /* Edit Display Title */
            'new_item' => __('New Work') ,

            /* New Display Title */
            'view_item' => __('View Work') ,

            /* View Display Title */
            'search_items' => __('Search Work') ,

            /* Search Custom Type Title */
            'not_found' => __('Nothing found in the Database.') ,

            /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash') ,

            /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ) ,

        /* end of arrays */
        'description' => __('This is the Work Section') ,

        /* Custom Type Description */
        'hierarchical'        => false,
        // 'hierarchical'        => true,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        //'taxonomies'          => array( 'work_category' ),
        'has_archive'         => true,
        'show_ui'             => true,
        'query_var'           => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-desktop',
        'rewrite'             => array(
            'slug' => 'work',
            'with_front' => false
        ) ,
        'capability_type'     => 'post',
        'show_in_rest'        => true, // gutenberg
        'supports'            => array(
            'title',
            'thumbnail',
            'revisions',
            'editor'
            // 'author'
            // 'comments',
            // 'excerpt',
            // 'page-attributes',
        ) ,
    )

    /* end of options */);

    /* end of register post type */

    register_taxonomy('work_category', 'work', array(
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'show_in_rest' => true, // gutenberg
        'label' => __("Work Category", 'ray_theme') ,
        'query_var' => true,
        'show_tagcloud' => true,
        'rewrite' => array(
            'slug' => 'show-category',
            'with_front' => false,
            'hierarchical' => true
        ) ,
    ));

    register_taxonomy('work_department', 'work', array(
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'show_in_rest' => true, // gutenberg
        'label' => __("Department", 'ray_theme') ,
        'query_var' => true,
        'show_tagcloud' => true,
        'rewrite' => array(
            'slug' => 'show-department',
            'with_front' => false,
            'hierarchical' => true
        ) ,
    ));

    register_taxonomy('work_broadcaster_category', 'work', array(
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'show_in_rest' => true, // gutenberg
        'label' => __("Broadcaster", 'ray_theme') ,
        'query_var' => true,
        'show_tagcloud' => true,
        // 'rewrite' => array(
        //     'slug' => 'show-category',
        //     'with_front' => false,
        //     'hierarchical' => true
        // ) ,
    ));


}

// adding the function to the Wordpress init
add_action('init', 'work');




