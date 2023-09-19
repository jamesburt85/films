<?php

// List terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

//$taxonomy     = $showTax ?? 'work_category';
if ( ('people' == get_post_type()) || is_tax('people_category') ) {
  $taxonomy   = $showTax ?? 'people_category';
} elseif ( ('kit' == get_post_type()) || is_tax('kit_category') ) {
  $taxonomy   = $showTax ?? 'kit_category';
} elseif ( ('work' == get_post_type()) || is_tax('work_category') || is_tax('work_department') ) {
    $taxonomy   = $showTax ?? 'work_category';
} else {
  $taxonomy   = $showTax ?? 'kit_category';
}
// $orderby      = 'name'; 
// $show_count   = false;
// $pad_counts   = false;
// $hierarchical = true;
$title = '';

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
<div class="flow--medium">

  <?php if ( 'people' == get_post_type() ) { ?>
    <h2 class="tiny medium">
      Our People
    </h2>
  <?php } ?>

  <div>
    <ul class="category-list__wrapper category-list flex capitalize">
      <?php // wp_list_categories( $args ); ?>
     
      <?php //$queried_object = get_queried_object();?>
      <?php
        //echo get_queried_object()->name;
      ?>

      <?php //if(get_queried_object()->term_id == $category->term_id) echo 'class="hidden"';?>

      <li class="">
        <a class="tiny medium no-underline" href="<?php echo get_post_type_archive_link($pType); ?>" class="<?php if( is_post_type_archive() ) { echo " active "; } ?>">
          All
        </a>
      </li>
      <?php
        if ( 'kit' == get_post_type() ) {
          $categories = get_the_terms( $post->ID, $taxonomy );
        } else {
          $categories = get_categories($args);
        }
        
        foreach($categories as $category) {
          
          $class = '';

          if (!empty(get_queried_object()->term_id)) {
            if ( get_queried_object()->term_id == $category->term_id ) {
                $class = 'active';
            }
          }

          // echo get_queried_object()->term_id;
          // echo $category->term_id;

          echo '<li class="' . $class . '">
            <a class="tiny medium no-underline" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>
            </li>';
          }
      ?>
    </ul>
  </div>
</div>