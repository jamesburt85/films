<?php

/*
 ** Register Custom Post Type for profile posts
*/

function cpt_service() {

    // creating (registering) the custom type (http://codex.wordpress.org/Function_Reference/register_post_type)
    register_post_type('service_cpt',

    // let's now add all the options for this post type
    array(
        'labels' => array(
            'name' => __('Services', 'post type general name') ,

            /* This is the Title of the Group */
            'singular_name' => __('Service', 'post type singular name') ,

            /* This is the individual type */
            'add_new' => __('Add New Service', 'custom post type item') ,

            /* The add new menu item */
            'add_new_item' => __('Add New Service') ,

            /* Add New Display Title */
            'edit' => __('Edit') ,

            /* Edit Dialog */
            'edit_item' => __('Edit Service') ,

            /* Edit Display Title */
            'new_item' => __('New Service') ,

            /* New Display Title */
            'view_item' => __('View Service') ,

            /* View Display Title */
            'search_items' => __('Search Service') ,

            /* Search Custom Type Title */
            'not_found' => __('Nothing found in the Database.') ,

            /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash') ,

            /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ) ,

        /* end of arrays */
        'description' => __('This is the Service Section') ,

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
        'menu_icon'           => 'dashicons-media-interactive',
        'rewrite'             => array(
            'slug' => 'services',
            'with_front' => false
        ) ,
        'capability_type'     => 'post',
        'show_in_rest'        => false, // gutenberg
        'supports'            => array(
            'title',
            'page-attributes',
            'thumbnail',
            'editor',
            'revisions'
            // 'author'
            // 'comments',
            // 'excerpt',
        ) ,
    )

    /* end of options */);

    /* end of register post type */


    // register_taxonomy('work_category', 'work', array(
    //     'public' => true,
    //     'show_ui' => true,
    //     'show_in_nav_menus' => true,
    //     'show_admin_column' => true,
    //     'hierarchical' => true,
    //     'label' => __("Work Category", 'ray_theme') ,
    //     'query_var' => true,
    //     'show_tagcloud' => true,
    //     'rewrite' => array(
    //         'slug' => 'show-category',
    //         'with_front' => false,
    //         'hierarchical' => true
    //     ) ,
    // ));

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
add_action('init', 'cpt_service');




