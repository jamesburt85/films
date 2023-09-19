<?php

/*
 ** Register Custom Post Type for profile posts
*/

function cpt_kit() {

    // creating (registering) the custom type (http://codex.wordpress.org/Function_Reference/register_post_type)
    register_post_type('kit',

    // let's now add all the options for this post type
    array(
        'labels' => array(
            'name' => __('Kit', 'post type general name') ,

            /* This is the Title of the Group */
            'singular_name' => __('Kit', 'post type singular name') ,

            /* This is the individual type */
            'add_new' => __('Add New Kit', 'custom post type item') ,

            /* The add new menu item */
            'add_new_item' => __('Add New Kit') ,

            /* Add New Display Title */
            'edit' => __('Edit') ,

            /* Edit Dialog */
            'edit_item' => __('Edit Kit') ,

            /* Edit Display Title */
            'new_item' => __('New Kit') ,

            /* New Display Title */
            'view_item' => __('View Kit') ,

            /* View Display Title */
            'search_items' => __('Search Kit') ,

            /* Search Custom Type Title */
            'not_found' => __('Nothing found in the Database.') ,

            /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash') ,

            /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ) ,

        /* end of arrays */
        'description' => __('This is the Kit Section') ,

        /* Custom Type Description */
        'hierarchical'        => true,
        // 'hierarchical'        => true,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        // 'taxonomies'  => array( 'category' ),
        'has_archive'         => true,
        'show_ui'             => true,
        'query_var'           => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-video-alt',
        'rewrite'             => array(
            'slug' => 'kit-hire',
            'with_front' => true
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

    register_taxonomy('kit_category', 'kit', array(
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'label' => __("Kit Category", 'ray_theme') ,
        'query_var' => true,
        'show_tagcloud' => true,
        'rewrite' => array(
            'slug' => 'kit-category',
            'with_front' => true,
            'hierarchical' => true
        ),
    ));

    // register_taxonomy('custom_tax', 'casestudy', array(
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_nav_menus' => true,
    //     'show_admin_column' => true,
    //     'hierarchical' => false,
    //     'label' => __("Country of Origin", 'tcc_theme') ,
    //     'query_var' => true,
    //     'rewrite' => array(
    //         'slug' => 'country',
    //     ) ,
    // ));
}

// adding the function to the Wordpress init
add_action('init', 'cpt_kit');
