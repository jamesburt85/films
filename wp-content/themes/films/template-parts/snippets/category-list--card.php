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
//$hierarchical = true;
//$title = '';

//echo $taxonomy;

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'        => 'term_order',
  //'exclude' => array(30),
  //'include_children' => false,
  // 'show_count'   => $show_count,
  // 'pad_counts'   => $pad_counts,
  //'hierarchical' => $hierarchical,
  //'title_li'     => $title,
  'hide_empty'     => true
  //'exclude' => 10, // Craft
);
?>

<?php if ( 'people' == get_post_type() ) { ?>
  <p class="tiny medium">
    Our People
  <p>
<?php } ?>

<div class="[ card-grid ] [ four-columns ] [ cards-wide ]">
	<?php // wp_list_categories( $args ); ?>
  <?php
    //if ( $taxonomy == 'get_post_type()' ) {
      //echo 'thitithihithih';
      //$categories = get_the_terms( $post->ID, $taxonomy );
    //} else {
    $categories = get_categories( $args );
      //echo 'elselselelelele';
    //}
    
    foreach( $categories as $category ) {
      // echo '<div class="card">
      //   <a class="tiny medium no-underline" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>
      //   </div>';
      // } 
      ?>

        <article class="[ card ] [ card--square ] [ flow ] [ flow--small ] fade-in-up">
            
            <a class="no-underline" href="<?php echo get_category_link( $category->term_id );?>">

                <?php
                  if ( get_field('featured_image', $category) ) {

                    $img = get_field('featured_image', $category);

                    include( get_template_directory() . '/template-parts/snippets/img.php');

                  } else {

                      $img = get_field('default_image', 'option');

                      include( get_template_directory() . '/template-parts/snippets/img.php');

                  }

                ?>

                <h2 class="entry-title body--large no-underline">
                  <?php echo $category->name; ?>
                </h2>
            </a>
            
        </article>

      <?php
    }
  ?>
</div>
