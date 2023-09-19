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
  <li class="color-grey medium tiny">
    Kit Hire
  </li>
  <li class="medium tiny no-underline">
    <a href="<?php echo site_url(); ?>/kit-hire">
      All
    </a>
  </li>
  <?php
    foreach( get_terms( 'kit_category', array( 'hide_empty' => true, 'parent' => 0 ) ) as $parent_term ) {
      // display top level term name
      echo '<li>
        <a class="medium tiny no-underline parent" href="' . get_category_link( $parent_term->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $parent_term->name ) . '" ' . '>' . $parent_term->name.'</a>
        </li>';

      // foreach( get_terms( 'kit_category', array( 'hide_empty' => true, 'parent' => $parent_term->term_id ) ) as $child_term ) {
      //   // display name of all childs of the parent term
      //   echo  '<li>
      //   <a class="medium tiny no-underline child" href="' . get_category_link( $child_term->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $child_term->name ) . '" ' . '>' . $child_term->name.'</a>
      //   </li>';
      // }
    }
  ?>
</ul>
