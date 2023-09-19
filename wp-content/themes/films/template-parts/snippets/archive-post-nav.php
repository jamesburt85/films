<div class="wrapper">
	<nav id="post-nav" class="post-nav archive--post-nav flex-center">
		<!-- <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div> -->
		<!-- <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div> -->
		<?php 
			// the_posts_pagination();
			$links = paginate_links( array(
			  'prev_next'          => false,
			  'type'               => 'array'
			) );

			if ( $links ) :

			    echo '<ul class="post-nav">';

			    // get_previous_posts_link will return a string or void if no link is set.
			    if ( $prev_posts_link = get_previous_posts_link( __( 'Previous Page' ) ) ) :
			        echo '<li class="prev-list-item no-underline">';
			        echo $prev_posts_link;
			        echo '</li>';
			    endif;

			    echo '<li class="no-underline">';
			    echo join( '</li><li>', $links );
			    echo '</li>';

			    // get_next_posts_link will return a string or void if no link is set.
			    if ( $next_posts_link = get_next_posts_link( __( 'Next Page' ) ) ) :
			        echo '<li class="next-list-item no-underline">';
			        echo $next_posts_link;
			        echo '</li>';
			    endif;
			    echo '</ul>';
			endif;
			
		?>
	</nav>
</div>