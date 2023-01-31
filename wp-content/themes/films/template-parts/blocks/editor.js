wp.domReady(() => {


    /**
     * Unregister WordPress core & WooCommerce blocks, uncomment as needed
     */

    // WP Core Blocks
    wp.blocks.unregisterBlockType('core/archives');
    wp.blocks.unregisterBlockType('core/audio');
    // wp.blocks.unregisterBlockType( 'core/block' );
    // wp.blocks.unregisterBlockType( 'core/button' );
    wp.blocks.unregisterBlockType('core/buttons');
    wp.blocks.unregisterBlockType('core/calendar');
    wp.blocks.unregisterBlockType('core/categories');
    wp.blocks.unregisterBlockType('core/code');
    wp.blocks.unregisterBlockType('core/column');
    wp.blocks.unregisterBlockType('core/columns');
    wp.blocks.unregisterBlockType('core/cover');
    // wp.blocks.unregisterBlockType( 'core/embed' );
    wp.blocks.unregisterBlockType('core/file');
    // wp.blocks.unregisterBlockType( 'core/freeform' );
    // wp.blocks.unregisterBlockType( 'core/gallery' );
    wp.blocks.unregisterBlockType('core/group');
    // wp.blocks.unregisterBlockType( 'core/heading' );
    // wp.blocks.unregisterBlockType( 'core/html' );
    // wp.blocks.unregisterBlockType( 'core/image' );
    wp.blocks.unregisterBlockType('core/latest-comments');
    wp.blocks.unregisterBlockType('core/latest-posts');
    // wp.blocks.unregisterBlockType( 'core/list' );
    wp.blocks.unregisterBlockType('core/loginout');
    wp.blocks.unregisterBlockType('core/media-text');
    wp.blocks.unregisterBlockType('core/missing');
    wp.blocks.unregisterBlockType('core/more');
    wp.blocks.unregisterBlockType('core/nextpage');
    wp.blocks.unregisterBlockType('core/page-list');
    // wp.blocks.unregisterBlockType( 'core/paragraph' );
    wp.blocks.unregisterBlockType('core/post-content');
    wp.blocks.unregisterBlockType('core/post-date');
    wp.blocks.unregisterBlockType('core/post-excerpt');
    wp.blocks.unregisterBlockType('core/post-featured-image');
    wp.blocks.unregisterBlockType('core/post-template');
    wp.blocks.unregisterBlockType('core/post-terms');
    wp.blocks.unregisterBlockType('core/post-title');
    // wp.blocks.unregisterBlockType( 'core/preformatted' );
    // wp.blocks.unregisterBlockType( 'core/pullquote' );
    wp.blocks.unregisterBlockType('core/query');
    wp.blocks.unregisterBlockType('core/query-pagination');
    wp.blocks.unregisterBlockType('core/query-pagination-next');
    wp.blocks.unregisterBlockType('core/query-pagination-numbers');
    wp.blocks.unregisterBlockType('core/query-pagination-previous');
    wp.blocks.unregisterBlockType('core/query-title');
    // wp.blocks.unregisterBlockType( 'core/quote' );
    wp.blocks.unregisterBlockType('core/rss');
    wp.blocks.unregisterBlockType('core/search');
    wp.blocks.unregisterBlockType('core/separator');
    wp.blocks.unregisterBlockType('core/shortcode');
    wp.blocks.unregisterBlockType('core/site-logo');
    wp.blocks.unregisterBlockType('core/site-tagline');
    wp.blocks.unregisterBlockType('core/site-title');
    wp.blocks.unregisterBlockType('core/social-link');
    wp.blocks.unregisterBlockType('core/social-links');
    wp.blocks.unregisterBlockType('core/spacer');
    wp.blocks.unregisterBlockType('core/table');
    wp.blocks.unregisterBlockType('core/tag-cloud');
    wp.blocks.unregisterBlockType('core/text-columns');
    wp.blocks.unregisterBlockType('core/verse');
    wp.blocks.unregisterBlockType('core/video');

    // WooCommerce
    wp.blocks.unregisterBlockType('woocommerce/active-filters');
    wp.blocks.unregisterBlockType('woocommerce/all-products');
    wp.blocks.unregisterBlockType('woocommerce/all-reviews');
    wp.blocks.unregisterBlockType('woocommerce/attribute-filter');
    wp.blocks.unregisterBlockType('woocommerce/featured-category');
    wp.blocks.unregisterBlockType('woocommerce/featured-product');
    wp.blocks.unregisterBlockType('woocommerce/handpicked-products');
    wp.blocks.unregisterBlockType('woocommerce/price-filter');
    wp.blocks.unregisterBlockType('woocommerce/product-best-sellers');
    wp.blocks.unregisterBlockType('woocommerce/product-categories');
    wp.blocks.unregisterBlockType('woocommerce/product-category');
    wp.blocks.unregisterBlockType('woocommerce/product-new');
    wp.blocks.unregisterBlockType('woocommerce/product-on-sale');
    wp.blocks.unregisterBlockType('woocommerce/product-search');
    wp.blocks.unregisterBlockType('woocommerce/product-tag');
    wp.blocks.unregisterBlockType('woocommerce/product-top-rated');
    wp.blocks.unregisterBlockType('woocommerce/products-by-attribute');
    wp.blocks.unregisterBlockType('woocommerce/reviews-by-category');
    wp.blocks.unregisterBlockType('woocommerce/reviews-by-product');


    /**
     * Unregister Embed block variations, uncomment as needed
     */
    wp.blocks.unregisterBlockVariation('core/embed', 'amazon-kindle');
    wp.blocks.unregisterBlockVariation('core/embed', 'animoto');
    wp.blocks.unregisterBlockVariation('core/embed', 'cloudup');
    wp.blocks.unregisterBlockVariation('core/embed', 'collegehumor');
    wp.blocks.unregisterBlockVariation('core/embed', 'crowdsignal');
    wp.blocks.unregisterBlockVariation('core/embed', 'dailymotion');
    wp.blocks.unregisterBlockVariation('core/embed', 'facebook');
    wp.blocks.unregisterBlockVariation('core/embed', 'flickr');
    wp.blocks.unregisterBlockVariation('core/embed', 'imgur');
    wp.blocks.unregisterBlockVariation('core/embed', 'instagram');
    wp.blocks.unregisterBlockVariation('core/embed', 'issuu');
    wp.blocks.unregisterBlockVariation('core/embed', 'kickstarter');
    wp.blocks.unregisterBlockVariation('core/embed', 'meetup-com');
    wp.blocks.unregisterBlockVariation('core/embed', 'mixcloud');
    wp.blocks.unregisterBlockVariation('core/embed', 'reddit');
    wp.blocks.unregisterBlockVariation('core/embed', 'reverbnation');
    wp.blocks.unregisterBlockVariation('core/embed', 'screencast');
    wp.blocks.unregisterBlockVariation('core/embed', 'scribd');
    wp.blocks.unregisterBlockVariation('core/embed', 'slideshare');
    wp.blocks.unregisterBlockVariation('core/embed', 'smugmug');
    wp.blocks.unregisterBlockVariation('core/embed', 'soundcloud');
    wp.blocks.unregisterBlockVariation('core/embed', 'speaker-deck');
    wp.blocks.unregisterBlockVariation('core/embed', 'spotify');
    wp.blocks.unregisterBlockVariation('core/embed', 'ted');
    wp.blocks.unregisterBlockVariation('core/embed', 'tiktok');
    wp.blocks.unregisterBlockVariation('core/embed', 'tumblr');
    wp.blocks.unregisterBlockVariation('core/embed', 'twitter');
    wp.blocks.unregisterBlockVariation('core/embed', 'videopress');
    wp.blocks.unregisterBlockVariation('core/embed', 'vimeo');
    wp.blocks.unregisterBlockVariation('core/embed', 'wordpress');
    wp.blocks.unregisterBlockVariation('core/embed', 'wordpress-tv');
    wp.blocks.unregisterBlockVariation('core/embed', 'youtube');


    /**
     * Yoast
     */

    wp.blocks.unregisterBlockType('yoast-seo/breadcrumbs');
    wp.blocks.unregisterBlockType('yoast/how-to-block');
    // wp.blocks.unregisterBlockType( 'yoast/faq-block' );


    /**
     * Additional
     */

    wp.blocks.unregisterBlockType('core/avatar');
    wp.blocks.unregisterBlockType('core/pattern');
    wp.blocks.unregisterBlockType('core/navigation');
    wp.blocks.unregisterBlockType('core/navigation-link');
    wp.blocks.unregisterBlockType('core/navigation-submenu');
    wp.blocks.unregisterBlockType('core/template-part');
    wp.blocks.unregisterBlockType('core/post-author');
    wp.blocks.unregisterBlockType('core/post-navigation-link');
    wp.blocks.unregisterBlockType('core/query-no-results');
    wp.blocks.unregisterBlockType('core/read-more');
    wp.blocks.unregisterBlockType('core/comment-author-name');
    wp.blocks.unregisterBlockType('core/comment-content');
    wp.blocks.unregisterBlockType('core/comment-date');
    wp.blocks.unregisterBlockType('core/comment-edit-link');
    wp.blocks.unregisterBlockType('core/comment-reply-link');
    wp.blocks.unregisterBlockType('core/comment-template');
    wp.blocks.unregisterBlockType('core/comments-title');
    wp.blocks.unregisterBlockType('core/comments-query-loop');
    wp.blocks.unregisterBlockType('core/comments-pagination');
    wp.blocks.unregisterBlockType('core/comments-pagination-next');
    wp.blocks.unregisterBlockType('core/comments-pagination-numbers');
    wp.blocks.unregisterBlockType('core/comments-pagination-previous');
    wp.blocks.unregisterBlockType('core/post-comments');
    wp.blocks.unregisterBlockType('core/post-comments-form');
    wp.blocks.unregisterBlockType('core/home-link');
    wp.blocks.unregisterBlockType('core/term-description');
    wp.blocks.unregisterBlockType('core/post-author-biography');


    /**
     * Unregister block styles examples
     */

    wp.blocks.unregisterBlockStyle('core/button', 'default');
    wp.blocks.unregisterBlockStyle('core/button', 'outline');
    wp.blocks.unregisterBlockStyle('core/button', 'fill');

    wp.blocks.unregisterBlockStyle('core/separator', 'wide');
    wp.blocks.unregisterBlockStyle('core/separator', 'dots');

    wp.blocks.unregisterBlockStyle('core/image', 'default');
    wp.blocks.unregisterBlockStyle('core/image', 'rounded');

    wp.blocks.unregisterBlockStyle('core/quote', 'default');
    wp.blocks.unregisterBlockStyle('core/quote', 'large');


    /**
     * Register custom styles & variations examples
     */

    /*
    wp.blocks.registerBlockStyle( 'core/latest-posts', {
    	name: 'columns',
    	label: 'Columns',
    	isDefault: false,
    } );

    wp.blocks.registerBlockStyle( 'core/cover', {
    	name: 'no-margin',
    	label: 'No margin',
    	isDefault: false,
    } );
    */


    /**
     * Uncomment the lines below to log all available block types to console
     */

    // jsblocks = wp.blocks.getBlockTypes();
    // console.log(jsblocks);
    // jsblocks.forEach(el => console.table(el.name));


});