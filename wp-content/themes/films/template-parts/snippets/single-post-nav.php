<nav id="post-nav" class="post-nav single--post-nav">
	<!-- <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div> -->
	<!-- <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div> -->
	<?php 
		// the_posts_pagination();
		// wp_link_pages(array(
		//     'before' => '<p>' . __('Pages:'),
		//     'after' => '</p>',
		//     'next_or_number' => 'next_and_number', # activate parameter overloading
		//     'nextpagelink' => __('Next'),
		//     'previouspagelink' => __('Previous'),
		//     'pagelink' => '%',
		//     'echo' => 1 )
		// );
		wp_link_pages();
	?>
</nav>