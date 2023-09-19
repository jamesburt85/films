<div class="accordion__item [ flow--medium ] fade-in-up">
  <div class="flex-space-between align-center borders--top accordion__title">
    <h2 class="body--large post-list--title grid--half">
      <?php the_title(); ?>
    </h2>
    <div class="post-list--details grid--quarter">
      
        <?php
          //$queried_object = get_queried_object();
          $categories = get_the_terms( $post->ID, 'work_broadcaster_category' );
          if ( $categories ) {
        ?>
            <p class="tiny medium">
              <?php
                foreach($categories as $category) {
                  echo $category->name;
                }
              ?>
            </p>

        <?php } ?>
    </div>
    
    <div class="post-list--details flex-space-between grid--quarter">
      <div>
        <?php $categories = get_the_terms( $post->ID, 'work_category' );
          if ( $categories ) { ?>
            <p class="tiny medium">
              <?php foreach($categories as $category) {
                echo $category->name;
              ?>
            </p>
          <?php  }
          }
        ?>
      </div>

      <div class="accordion__arrow-container">
        <div class="accordion__arrow arrow--next"></div>  
      </div>
      
    </div>
  </div>

  <div class="accordion__content">
    <div class="flex-space-between">
      <div class="grid--half flex">
        <?php include( get_template_directory() . '/template-parts/logic/get_featured_img.php'); ?> 
      </div>

      <div class="grid--quarter tiny medium">
        <div class="tiny medium hero--text">
          <?php the_field('project_specifics'); ?>
        </div>
      </div>

      <div class="grid--quarter"></div>
    </div>
  </div>
</div>