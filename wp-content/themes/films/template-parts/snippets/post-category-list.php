<?php 

// List terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

//$taxonomy     = $showTax ?? 'work_category';
// if ( is_post_type_archive('people') || is_tax('people_category') ) {
//   $taxonomy   = $showTax ?? 'people_category';
// } elseif ( is_post_type_archive('kit') || is_tax('kit_category') ) {
  $taxonomy   = $showTax ?? 'category';
// } else {
//   $taxonomy   = $showTax ?? 'work_category';
// }
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
  // 'exclude' => 10, //Management
);
?>

<ul class="category-list">
	<?php // wp_list_categories( $args ); ?>
  <li>
    <?php
      $active = '';
      if ( is_home() ) {
        $active = 'active';
      }
    ?>
    <a class="<?php echo $active; ?> pill" href="<?php echo get_post_type_archive_link('post'); ?>">
      All
    </a>
  </li>
  <?php
    // Get the current category name
    $current_cat = single_cat_title("", false);

    $categories = get_categories($args);
    foreach($categories as $category) {

      // Check if the current category matches the loop category
      $active_class = ($current_cat === $category->name) ? 'active' : '';

      echo '<li>
        <a class="pill '. $active_class .' " href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>
        </li>';
      } 
  ?>
</ul>