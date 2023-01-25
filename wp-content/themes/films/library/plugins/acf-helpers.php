<?php 

# Register Options Page

if( function_exists('acf_add_options_page')) {

    $page = acf_add_options_page(array(
        'page_title'    => 'Site General Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'general-settings',
        'capability'    => 'delete_others_pages', // Editor's only
        'redirect'  => false
    ));

}

// if( function_exists('acf_add_options_page')) {

//     $page = acf_add_options_page(array(
//         'page_title'    => 'Sitewide Copy Settings',
//         'menu_title'    => 'Sitewide Copy Settings',
//         'menu_slug'     => 'sitewide-copy-settings',
//         'capability'    => 'delete_others_pages', // Editor's only
//         'redirect'  => false
//     ));

// }



/**
 * Add quick-collapse feature to ACF Flexible Content fields
 */
add_action('acf/input/admin_head', function() { ?>
    <script>
        (function($) {
            $(document).ready(function() {
                var collapseButtonClass = 'collapse-all';

                // Add a clickable link to the label line of flexible content fields
                $('.acf-field-flexible-content > .acf-label')
                    .append('<a class="' + collapseButtonClass + '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>');

                // Simulate a click on each flexible content item's "collapse" button when clicking the new link
                $('.' + collapseButtonClass).on('click', function() {
                    $('.acf-flexible-content .layout:not(.-collapsed) .acf-fc-layout-controls .-collapse').click();
                });
            });
        })(jQuery);
    </script><?php
});





// add ACF Google Maps key
// function my_acf_init() {
//     acf_update_setting('google_api_key', 'XXXXX');
// }

// add_action('acf/init', 'my_acf_init');



# Get gForms for ACF select field
function wiaw_acf_select_add_gforms( $field ) {

	$field['choices'] = array();
	$choices = array();

	# Get something
	if ( class_exists( 'RGFormsModel')) {
		$choices = RGFormsModel::get_forms( null, 'title' );
	}

	# Populate choices
	if ( !empty( $choices)) {
		foreach ($choices as $key => $value) {
			$field['choices'][$value->id] = $value->title;
		}
	}

	# Return the values to ACF
	return $field;
}
// turn on keys in ACF options tab to grab field key to add Gforms to that select field
// add_filter('acf/load_field/key=field_5ae9a80e4bb9e', 'wiaw_acf_select_add_gforms');


// # Can't decide if this is a GF function, or ACF. But it's here anyway
// 	## Output GF form generator button on ACF wysywig option fields
// function wiaw_add_gf_button_to_acf_option_pages( $is_post_edit_page ) {
//     if ( isset( $_GET['page'] )) {
//     	global $option_page_slugs;

//     	if ( in_array( $_GET['page'], $option_page_slugs)) {
// 	        return true;
//     	}
//     }
//     return $is_post_edit_page;
// }
// add_filter( 'gform_display_add_form_button', 'wiaw_add_gf_button_to_acf_option_pages' );



# Register a super simple toolbar for ACF’s WYSIWYG field

add_filter( 'acf/fields/wysiwyg/toolbars', function ( $toolbars ) {

	$toolbars['Bare'] = [];
	$toolbars['Bare'][1] = [ 'forecolor', 'link', 'strikethrough', 'bold', 'italic' ];

	return $toolbars;
	
} );



# Function to return custom options to ACF select field
# - sample
function wiaw_custom_acf_select_options( $field ) {

	$field['choices'] = array();

	# Get something
	$choices = array(
			'foo' => 'something',
			'bar' => 'something else'
		);

	# Populate choices
	if ( !empty( $choices)) {
		foreach ($choices as $key => $value) {
			$field['choices'][$key] = $value;
		}
	}

	# Return the values to ACF
	return $field;

}
// add_filter('acf/load_field/key=field_57051852f30fb', 'wiaw_custom_acf_select_options');

