<?php
/*
Template Name: Services Page
*/

get_header();

// $acf_fields 	= get_fields();
$services_list = get_field( 'services_list' ) ?? null;
// echo "<pre>";
// print_r($services_list);
// echo "</pre>";

?>
		
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article class="entry-content [ wrapper ]">

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

				<div class="with-sidebar services_list">
					

						<!-- <h2>list of services</h2> -->
						

				<?php if (!empty($services_list)) {

					?>

					<div class="sidebar services-sidebar-list ">
						<div class="is-sticky">
							<ul>
								<?php foreach ($services_list as $service) {

									$service_name = $service['service_name'];
									$anchor = str_replace(' ', '_', $service_name);
									$anchor = strtolower($anchor);

									if (!empty($service_name)) { ?>
										<li>
											<a href="#<?php echo $anchor; ?>">
												<?php echo $service_name; ?>
											</a>
										</li>
									<?php }

								}	?>

							</ul>

						</div>

					</div>

				<?php } ?>


				<?php if (!empty($services_list)) { ?>

					<div class="not-sidebar">

						<?php foreach ($services_list as $service) {
							$service_name = $service['service_name'];
							$service_image = $service['service_image'];
							$service_description = $service['service_description'];
							$sub_services = $service['sub_services'];

							$anchor = str_replace(' ', '_', $service_name);
							$anchor = strtolower($anchor);
						?>

							<div id="<?php echo $anchor; ?>" class="service_content">
								<?php if (!empty($service_name)) { ?>
									<h3>						
										<?php echo $service_name; ?>
									</h3>
								<?php }	?>
								<?php if (!empty($service_image)) {
									$img = $service_image;
									include( get_template_directory() . '/template-parts/snippets/img.php');
								}	?>
								<?php if (!empty($service_description)) { ?>
									<p>						
										<?php echo $service_description; ?>
									</p>
								<?php }	?>
								<?php if (!empty($sub_services)) { ?>
									<h4><?php echo $service_name; ?> includes:</h4>
									<ul>
										<?php foreach ($sub_services as $sub_service) { ?>	
											<li>
												<h3><?php echo $sub_service['sub_service_name']; ?></h3>
											</li>
										<?php }	?>
									</ul>
								<?php }	?>
							</div>

						<?php } ?>

					</div>

				<?php } ?>
				
				</div>

			<?php // include( get_template_directory() . '/template-parts/snippets/breadcrumbs.php'); ?>
			<?php the_content();?>
		</article>
		<?php endwhile;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif; ?>
	
<?php get_footer();

