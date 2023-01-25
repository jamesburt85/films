<?php 

// show profile card
// echo "<pre>"; print_r($post_author); echo "</pre>";

$args = array(
    'post_type'     => 'profile_cpt',
    // 'post_status'   => 'publish',
    'post__in'      => array($post_author),
    // 'orderby'       => 'post__in',
    // 'post__not_in'     => array( $post->ID ),
);

// echo "<pre>"; print_r($args); echo "</pre>";

$profiles = get_posts( $args );

// echo "<pre>"; print_r($profiles); echo "</pre>";

foreach ($profiles as $post) {

  setup_postdata( $post);

  $profile_fields = get_fields($post->ID);

  // echo "<pre>"; print_r($post); echo "</pre>";

  if (!empty($profile_fields)) {
    // echo "<pre>"; print_r($profile_fields); echo "</pre>";
    $profile_photo        = $profile_fields['profile_photo'] ?? null;
    $full_name            = $profile_fields['full_name'] ?? null;
    $position_company     = $profile_fields['position_company'] ?? null;
    // $profile_description  = $profile_fields['profile_description'] ?? null;
    // $twitter_url          = $profile_fields['twitter_url'] ?? null;
    // $linked_in_url        = $profile_fields['linked_in_url'] ?? null;
  }

  include( get_template_directory() . '/template-parts/cards/card-profile.php');

  $profile_photo        = null;
  $full_name            = null;
  $position_company     = null;
  // $profile_description  = null;
  // $twitter_url          = null;
  // $linked_in_url        = null;

} // end foreach

wp_reset_postdata();