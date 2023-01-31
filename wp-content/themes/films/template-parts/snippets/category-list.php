<?php 

// List terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

//$taxonomy     = $showTax ?? 'work_category';
if ( ('people' == get_post_type()) || is_tax('people_category') ) {
  $taxonomy   = $showTax ?? 'people_category';
} elseif ( ('kit' == get_post_type()) || is_tax('kit_category') ) {
  $taxonomy   = $showTax ?? 'kit_category';
} elseif ( ('work' == get_post_type()) || is_tax('work_category') ) {
    $taxonomy   = $showTax ?? 'work_category';
} else {
  $taxonomy   = $showTax ?? 'kit_category';
}
// $orderby      = 'name'; 
// $show_count   = false;
// $pad_counts   = false;
// $hierarchical = true;
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  // 'orderby'      => $orderby,
  // 'show_count'   => $show_count,
  // 'pad_counts'   => $pad_counts,
  // 'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'exclude' => 10, // Craft
);
?>

<ul class="category-list">
	<?php // wp_list_categories( $args ); ?>
  <?php
    if ( 'kit' == get_post_type() ) {
      $categories = get_the_terms( $post->ID, $taxonomy );
    } else {
      $categories = get_categories($args);
    }
    
    foreach($categories as $category) { 
      echo '<li>
        <a class="button pill" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>
        </li>';
      } 
  ?>
</ul>