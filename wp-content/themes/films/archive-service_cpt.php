<?php get_header(); ?>

	<article class="entry-content wrapper">

		<div class="with-sidebar">
			<div class="sidebar">
				
			<h1>Services</h1>

			<p>At Films@59, we offer an all-encompassing service for film production. From the initial planning stages to the final delivery, we handle every aspect of the process with expertise and efficiency. Our goal is to provide a seamless and stress-free experience for our clients, delivering high-quality films that bring their vision to life.</p>

			
			</div>
			<div class="not-sidebar">
				<img src="https://picsum.photos/900/<?php echo rand(500, 700); ?>?random=1&grayscale&blur=5">
			</div>
		</div>

		<div>
			<h2>We provide the complete end-to-end service, from planning to delivery, Films@59 can do it all</h2>
		</div>


		<div class="with-sidebar ">
			<div class="sidebar services-sidebar-list ">

				<!-- <h2>list of services</h2> -->
				<div class="is-sticky">
					<ul>
					<?php 
						// https://wordpress.stackexchange.com/questions/103958/custom-post-type-hierarchical-loop-in-homepage

						// $args = array(
						//     'post_type'    => 'service_cpt',
						//     'title_li' => ''
						//     // 'post_status'  => 'publish',
						//     // 'author' => $idutente, // must be comma separated list of IDs
						// );
						// wp_list_pages($args);

						// $walker = new Ray_Nav_Walker();
						wp_list_pages( array(
						    'title_li' => '',
						    'post_type'    => 'service_cpt',
						    // 'walker' => $walker
						    ) );
					?>

					<!-- <h3>Our Services</h3> -->
					</ul>
				</div>
					
				<?php // while ( have_posts() ) : the_post(); ?>
					<!-- <li>				 -->
						<?php // the_title(); ?>
					<!-- </li> -->
				<?php // endwhile;	?>
				<!-- </ul> -->
			
			</div>
		
			<div class="not-sidebar">

				<?php 

					$args = array(
					    'post_type'    => 'service_cpt',
					    // 'title_li' => ''
					    'order' => 'ASC',
					    'posts_per_page' => -1,
					    'orderby' => 'menu_order',
					    'post_status'  => 'publish',
					    'post_parent' => 0, // just the parents
					    // 'author' => $idutente, // must be comma separated list of IDs
					);

					// The Query
					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) {
					        echo '<ul class=" [ flow ]">';
					    while ( $the_query->have_posts() ) {
					        $the_query->the_post();
					        ?>


					        	<h3><?php the_title(); ?></h3>
					        	<img src="https://picsum.photos/900/<?php echo rand(500, 700); ?>?random=1&grayscale&blur=5">
					        	<!-- <img src="https://picsum.photos/900/<?php // echo rand(500, 700); ?>?random=1&grayscale&blur=2"> -->
					        	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

					        	<?php $people = get_field( 'people' ); ?>
					        	<?php if ( $people ) : ?>

					        		
				        			<h2>Team</h2>

				        			<div class="[ card-grid ]">

				        			<?php foreach ( $people as $post ) : ?>
				        				<?php //setup_postdata ( $post ); ?>
				        				<!-- <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> -->

				        				<?php get_template_part( 'template-parts/cards/card', $pType ); ?>

				        			<?php endforeach; ?>

				        			<?php wp_reset_postdata(); ?>

				        			</div>
					        		
					        		
					        	<?php endif; ?>

					        <div class="with-sidebar">
					        	<div class="not-sidebar">

						        	<h3><?php the_title(); ?></h3>
						        	<!-- <img src="https://picsum.photos/900/<?php // echo rand(500, 700); ?>?random=1&grayscale&blur=2"> -->
						        	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

						        	<a href="<?php the_permalink(); ?>" class="button">
						        		<div class="with-icon">
							        		<h4><?php the_title(); ?></h4>
							        		<div class="icon">
								        		<?php get_template_part('dist/svg_php/inline', 'arrow-right.svg'); ?>
							        		</div>
						        		</div>
						        	</a>

					        	</div>

					        	<div class="sidebar">
					        		<img src="https://picsum.photos/900/<?php echo rand(500, 700); ?>?random=1&grayscale&blur=5">
					        	</div>

					        </div>

					        <?php 

					        $serviceParent = get_the_title();


					        $child_lvl_1_pages = new WP_Query( array(
					            'post_type'      => 'service_cpt', // set the post type to page
					            'posts_per_page' => -1, // number of posts (pages) to show
					            'post_parent'    => get_the_ID(), // enter the post ID of the parent page
					            'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
					        ) );

					        if ( $child_lvl_1_pages->have_posts() ) { ?>

					        	<p><?php echo $serviceParent; ?> Services:</p>

					        	<ul>
					        		
					        	

						        <?php while ( $child_lvl_1_pages->have_posts() ) : $child_lvl_1_pages->the_post();
						            // Do whatever you want to do for every page. the_title(), the_permalink(), etc... ?>
						            <li>
							            <a href="<?php the_permalink(); ?>" class="button">
							            	<div class="with-icon">
								        		<h4><?php the_title(); ?></h4>
								        		<div class="icon">					        			
									        		<?php get_template_part('dist/svg_php/inline', 'arrow-right.svg'); ?>
								        		</div>
							        		</div>
							            </a>
						            </li>
						            	<!-- <p>Magna Quam Ornare Commodo Ultricies</p> -->

						            	<?php 
						            		// $child_lvl_2_pages = new WP_Query( array(
						            		//     'post_type'      => 'service_cpt', // set the post type to page
						            		//     'posts_per_page' => -1, // number of posts (pages) to show
						            		//     'post_parent'    => get_the_ID(), // enter the post ID of the parent page
						            		//     'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
						            		// ) );

						            		// if ( $child_lvl_2_pages->have_posts() ) : while ( $child_lvl_2_pages->have_posts() ) : $child_lvl_2_pages->the_post();
						            		//     // Do whatever you want to do for every page. the_title(), the_permalink(), etc... ?>

						            		     	<!-- <h4><?php // the_title(); ?></h4> -->
						            		    	<!-- <p>Magna Quam Ornare Commodo Ultricies</p> -->

						            		 <?php // endwhile; endif;  

						            		// wp_reset_postdata();
						            	?>
						         	<!-- </div> -->

						            <!-- <div class="sidebar">
						            	<img src="https://picsum.photos/900/<?php echo rand(500, 700); ?>?random=1&grayscale&blur=5">
						         	</div>
						         </div> -->

						        <?php endwhile; ?>

						        </ul>

					    	<?php }

					        wp_reset_postdata();

					    }
					        echo '</ul>';
					} else {
					    // no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();

					// $child_pages = new WP_Query( array(
					//     'post_type'      => 'page', // set the post type to page
					//     'posts_per_page' => 10, // number of posts (pages) to show
					//     'post_parent'    => <ID of the parent page>, // enter the post ID of the parent page
					//     'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
					// ) );

					// if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();
					//     // Do whatever you want to do for every page. the_title(), the_permalink(), etc...
					// endwhile; endif;  

					// wp_reset_postdata();

				?>

			</div>

		</div>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php include( get_template_directory() . '/template-parts/snippets/archive-post-nav.php'); ?>

	</article>

<?php get_footer(); ?>