<?php

/**
 * Gutenberg scripts and styles
 *
 */
function be_gutenberg_scripts() {
  // wp_enqueue_style( 'theme-fonts', be_theme_fonts_url() );
  wp_enqueue_script( 'theme-editor', get_stylesheet_directory_uri() . '/template-parts/blocks/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory_uri() . '/template-parts/blocks/editor.js' ),
  true );
}
add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );


add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/hero' );
    register_block_type( __DIR__ . '/copy' );
    register_block_type( __DIR__ . '/cards' );
    register_block_type( __DIR__ . '/statement' );
    register_block_type( __DIR__ . '/testimonials' );
    register_block_type( __DIR__ . '/logowall' );
    register_block_type( __DIR__ . '/sitewide' );
    register_block_type( __DIR__ . '/psgallery' );
}

// add_action('acf/init', 'my_acf_blocks_init');
// function my_acf_blocks_init() {

//     // Check function exists.
//     if( function_exists('acf_register_block_type') ) {

//         // Register a hero block.
//         acf_register_block_type(array(
//             'name'              => 'hero',
//             'title'             => __('Hero'),
//             'description'       => __('A custom hero block.'),
//             'render_template'   => 'template-parts/blocks/hero/hero.php',
//             'mode'              => 'preview',
//             'category'          => 'formatting',
//         ));
//     }
// }



// add_action('acf/init', 'my_acf_init_block_types');
// function my_acf_init_block_types()
// {
//     function setup_block_categories_all( $categories ) {
//         return array_merge(
//             $categories,
//             [
//                 [
//                     'slug'  => 'fk-blocks',
//                     'title' => __( 'FK Blocks', 'fk-blocks' ),
//                 ],
//             ]
//         );
//     }
//     //this adds the block category into Gutenburg
//     add_action( 'block_categories_all', 'setup_block_categories_all', 10, 2 );

//     $fk_logo = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 139.34 72.08"><path d="M96.74,36.8,126.81,0h-5.14L89.73,39.1V0H71.19V63a2.6,2.6,0,0,1-.92,2.46l-6.86,6.06v.6H89.74V45.39L96.6,37l21.27,35.08h21.47L117.59,36.8ZM26.37,4h37V0H0V.5L6.87,6.67A2.61,2.61,0,0,1,7.8,9.13v63H26.37V38H57.46V34H26.37Z" fill="#23282e"/></svg>';

//     //This adds the blocks
//     if (function_exists('acf_register_block_type')) {

//       acf_register_block_type(array(
//         'name'              => 'hero',
//         'title'             => __('Hero Panel (full bleed)'),
//         'description'       => __('Hero (top section of page/post'),
//         'render_template'   => 'template-parts/blocks/hero/hero.php',
//         'category'          => 'fk-blocks',
//         'icon'              => $fk_logo,
//         'mode'              => 'edit',
//         'keywords'          => array('hero'),
//         'example'  => array(
//           'attributes' => array(
//           'mode' => 'preview',
//           'data' => array(
//           'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/hero.jpg',
//             )
//           )
//         )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'herocon',
//           'title'             => __('Hero Panel (contained)'),
//           'description'       => __('Hero (top section of page/post'),
//           'render_template'   => 'template-parts/blocks/hero_contained/hero_contained.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('hero_contained'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/hero-contained.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'fcr',
//           'title'             => __('Feature Card Row'),
//           'description'       => __('Feature Card Row'),
//           'render_template'   => 'template-parts/blocks/feature_card_row/feature_card_row.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('feature card row'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/feat-card-row.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'fbs',
//           'title'             => __('Feature Blocks Small'),
//           'description'       => __('Feature Blocks Small'),
//           'render_template'   => 'template-parts/blocks/feature_blocks_small/feature_blocks_small.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('feature_blocks_small'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/feat-block-small.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'fbl',
//           'title'             => __('Feature Blocks Large'),
//           'description'       => __('Feature Blocks Large'),
//           'render_template'   => 'template-parts/blocks/feature_blocks_large/feature_blocks_large.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('feature_blocks_large'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/feat-block-large.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'cta',
//           'title'             => __('Call To Action'),
//           'description'       => __('Call To Action'),
//           'render_template'   => 'template-parts/blocks/call_to_action/call_to_action.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('call_to_action'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/cta.jpg',
//                       )
//                     )
//                   )
//       ));     

//       acf_register_block_type(array(
//           'name'              => 'bcr',
//           'title'             => __('Basic Card Row'),
//           'description'       => __('Basic Card Row'),
//           'render_template'   => 'template-parts/blocks/basic_card_row/basic_card_row.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('basic_card_row'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/basic-card-row.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'quote',
//           'title'             => __('Quote Block'),
//           'description'       => __('Quote Block'),
//           'render_template'   => 'template-parts/blocks/quote_block/quote_block.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('quote_block'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/quote.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'pcon',
//           'title'             => __('Post Content'),
//           'description'       => __('Post Content'),
//           'render_template'   => 'template-parts/blocks/post_content/post_content.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('post_content'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/post-content.jpg',
//                       )
//                     )
//                   )
//       ));

//       // acf_register_block_type(array(
//       //     'name'              => 'tab_block',
//       //     'title'             => __('Tab Block'),
//       //     'description'       => __('Tab Block'),
//       //     'render_template'   => 'template-parts/blocks/tab_block/tab_block.php',
//       //     'category'          => 'fk-blocks',
//       //     'icon'              => $fk_logo,
//       //     'mode'              => 'edit',
//       //     'keywords'          => array('tab_block'),


//       acf_register_block_type(array(
//           'name'              => 'statement',
//           'title'             => __('Statement Block'),
//           'description'       => __('Statement Block'),
//           'render_template'   => 'template-parts/blocks/statement/statement.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('statement'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/statement.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'badges',
//           'title'             => __('Badge Block'),
//           'description'       => __('Badge Block'),
//           'render_template'   => 'template-parts/blocks/badge_block/badge_block.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('badge_block'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/badges.jpg',
//                       )
//                     )
//                   )
//       ));

//       // acf_register_block_type(array(
//       //     'name'              => 'body',
//       //     'title'             => __('Body Copy Block'),
//       //     'description'       => __('Body Copy Block'),
//       //     'render_template'   => 'template-parts/blocks/body_copy/body_copy.php',
//       //     'category'          => 'fk-blocks',
//       //     'icon'              => $fk_logo,
//       //     'mode'              => 'edit',
//       //     'keywords'          => array('body_copy'),
     

//       acf_register_block_type(array(
//           'name'              => 'video',
//           'title'             => __('Video Block'),
//           'description'       => __('Video Block'),
//           'render_template'   => 'template-parts/blocks/video/video.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('video'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/video.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'profiles',
//           'title'             => __('Profiles Block'),
//           'description'       => __('Profiles Block'),
//           'render_template'   => 'template-parts/blocks/profiles/profiles.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('profiles'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/profiles.jpg',
//                       )
//                     )
//                   )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'leadership',
//           'title'             => __('Leadership Block'),
//           'description'       => __('Leadership Block'),
//           'render_template'   => 'template-parts/blocks/leadership/leadership.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('leadership'),
//           'example'  => array(
//             'attributes' => array(
//             'mode' => 'preview',
//             'data' => array(
//             'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/leadership.jpg',
//               )
//             )
//           )
//       ));

//       acf_register_block_type(array(
//           'name'              => 'form',
//           'title'             => __('Form'),
//           'description'       => __('Text with list of form'),
//           'render_template'   => 'template-parts/blocks/form/form.php',
//           'category'          => 'fk-blocks',
//           'icon'              => $fk_logo,
//           'mode'              => 'edit',
//           'keywords'          => array('form'),
//           'example'  => array(
//                     'attributes' => array(
//                     'mode' => 'preview',
//                     'data' => array(
//                     'preview_image_help' => get_template_directory_uri() . '/src/images/block-thumb/form.jpg',
//                       )
//                     )
//                   )
//       ));

//     }
// }


// // function usr_allowed_block_types( $allowed_blocks ) {
// //   return array(
    
// //     // 'core/freeform', // classic editor block
// //     'core/video',
// //     'core/heading',
// //     'core/image',
// //     'core/gallery',
// //     'core/embed',
// //     'core/table',
// //     'core/list',
// //     'core/paragraph',
// //     'core/pullquote',
// //     'core/html',

// //     // 'core/paragraph',
// //     // 'core/image',
// //     // 'core/heading',
// //     // 'core/gallery',
// //     // 'core/list',
// //     // 'core/quote',
// //     // 'core/shortcode',
// //     // 'core/archives',
// //     // 'core/audio',
// //     // 'core/button',
// //     // 'core/buttons',
// //     // 'core/calendar',
// //     // 'core/categories',
// //     // 'core/code',
// //     // 'core/columns',
// //     // 'core/column',
// //     // 'core/cover',
// //     // 'core/embed',
// //     // 'core/file',
// //     // 'core/group',
// //     // 'core/freeform',
// //     // 'core/html',
// //     // 'core/media-text',
// //     // 'core/latest-comments',
// //     // 'core/latest-posts',
// //     // 'core/missing',
// //     // 'core/more',
// //     // 'core/nextpage',
// //     // 'core/preformatted',
// //     // 'core/pullquote',
// //     // 'core/rss',
// //     // 'core/search',
// //     // 'core/separator',
// //     // 'core/block',
// //     // 'core/social-links',
// //     // 'core/social-link',
// //     // 'core/spacer',
// //     // 'core/subhead',
// //     // 'core/table',
// //     // 'core/tag-cloud',
// //     // 'core/text-columns',
// //     // 'core/verse',
// //     // 'core/video',
    
// //   );
// // }

// // add_filter( 'allowed_block_types_all', 'usr_allowed_block_types' );



// function adstyles_allowed_block_types($allowed_block_types, $post) {
  
//   $allowed_core = [
//     // 'core/video',
//     'core/heading',
//     'core/image',
//     'core/gallery',
//     // 'core/embed',
//     'core/table',
//     'core/list',
//     'core/paragraph',
//     'core/pullquote',
//     // 'core/html',
//   ];

//   $acf = [
//     'acf/hero',
//     'acf/herocon',
//     'acf/fbs',
//     'acf/fbl',
//     'acf/cta',
//     'acf/fcr',
//     'acf/bcr',
//     'acf/quote',
//     'acf/pcon',
//     'acf/statement',
//     'acf/badges',
//     'acf/video',
//     'acf/profiles',
//     'acf/leadership',
//     'acf/form'
//   ];

//   $allowed_core_and_acf = array_merge($acf, $allowed_core);


//   if ($post->post_type == 'post') {
//     // return $allowed_core_and_acf;
//     return array(
//       'acf/pcon'
//     );
//   } else if ($post->post_type == 'page') {
//     // return $allowed_core_and_acf;
//     return $acf;
//   } else {
//     return $allowed_core_and_acf;
//   }
// }

// add_filter('allowed_block_types', 'adstyles_allowed_block_types', 10, 2);
