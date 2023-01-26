

<?php 

// List terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = $showTax ?? 'work_category';
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
  'title_li'     => $title
);
?>

<ul class="category-list">
	<?php wp_list_categories( $args ); ?>
</ul>