<?php 

// List terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

//$taxonomy     = $showTax ?? 'work_category';
// if ( is_post_type_archive('people') || is_tax('people_category') ) {
//   $taxonomy   = $showTax ?? 'people_category';
// } elseif ( is_post_type_archive('kit') || is_tax('kit_category') ) {
  $taxonomy   = $showTax ?? 'kit_category';
// } else {
//   $taxonomy   = $showTax ?? 'work_category';
// }
// $orderby      = 'name'; 
// $show_count   = false;
// $pad_counts   = false;
$hierarchical = true;
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  // 'orderby'      => $orderby,
  // 'show_count'   => $show_count,
  // 'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
);
?>

<ul class="category-list">
	<?php // wp_list_categories( $args ); ?>
  
  <?php 
    $categories = get_categories($args);
    foreach($categories as $category) { 
      echo '<li>
        <a class="button pill" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>
        </li>';
      } 
  ?>
</ul>