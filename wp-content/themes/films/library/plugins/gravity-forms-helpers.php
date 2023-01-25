<?php 

/**********************************************
 * Gravity Forms capabilities to Editor role
 **********************************************/

/**
 * Add all Gravity Forms capabilities to Editor role.
 * Runs when this theme is activated.
 * 
 * @access public
 * @return void
 */
function grant_gforms_editor_access() {
  
  $role = get_role( 'editor' );
  $role->add_cap( 'gform_full_access' );
}
// Tie into the 'after_switch_theme' hook
add_action( 'after_switch_theme', 'grant_gforms_editor_access' );

/**
 * Remove Gravity Forms capabilities from Editor role.
 * Runs when this theme is deactivated (in favor of another).
 * 
 * @access public
 * @return void
 */
function revoke_gforms_editor_access() {
  
  $role = get_role( 'editor' );
  $role->remove_cap( 'gform_full_access' );
}
// Tie into the 'switch_theme' hook
add_action( 'switch_theme', 'revoke_gforms_editor_access' );



/**********************************************
 * GRAV FORM ANCHORING!
 **********************************************/
add_filter( 'gform_confirmation_anchor', '__return_true' );


/**********************************************
 * GRAV FORM LOADER GIF REPLACE!
 **********************************************/

function gf_spinner_replace( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}
add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );





// # Select Gravity Forms for an ACF select field
// function acf_select_add_gravity_forms( $field ) {

//  $field['choices'] = array();
//  $choices = array();

//  # Get something
//  if ( class_exists( 'RGFormsModel')) {
//    $choices = RGFormsModel::get_forms( null, 'title' );
//  }

//  # Populate choices
//  if ( !empty( $choices)) {
//    foreach ($choices as $key => $value) {
//      $field['choices'][$value->id] = $value->title;
//    }
//  }

//  # Return the values to ACF
//  return $field;
// }
// add_filter('acf/load_field/key=field_5ae9a80e4bb9e', 'acf_select_add_gravity_forms');
// add_filter('acf/load_field/key=field_5be420389cf4d', 'acf_select_add_gravity_forms');





// # Select Gravity Forms for an ACF select field
// function acf_select_add_gravity_forms( $field ) {

//   $field['choices'] = array();
//   $choices = array();

//   # Get something
//   if ( class_exists( 'RGFormsModel')) {
//     $choices = RGFormsModel::get_forms( null, 'title' );
//   }

//   # Populate choices
//   if ( !empty( $choices)) {
//     foreach ($choices as $key => $value) {
//       $field['choices'][$value->id] = $value->title;
//     }
//   }

//   # Return the values to ACF
//   return $field;
// }
// // add_filter('acf/load_field/key=field_5ae9a80e4bb9e', 'acf_select_add_gravity_forms');
// // add_filter('acf/load_field/key=field_5be420389cf4d', 'acf_select_add_gravity_forms');





/**********************************************
 * GRAV FORM SCRIPTS IN FOOTER
 **********************************************/
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
	return true;
}