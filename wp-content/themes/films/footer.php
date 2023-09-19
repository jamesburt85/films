
			<footer class="[ site-footer ] [ flow ] [ bg-dark-shade ]">


				<div class="block-copy narrow">
				    
				    <div class="[ wrapper ] [ side-by-side ] fade-in-up">
				        
			            <div class="column-one [ flow ]">
			                <h2>
			                	<?php echo get_field('header', 'option'); ?>
			                </h2>
			            </div>
			        
			            <div class="column-two [ flow ]">
			                <?php echo get_field('copy', 'option'); ?>
			            </div>

				    </div>

				</div>

				<div class="wrapper footer-navigation-wrapper">
					<div class="borders [ flow-padding ] [ flow--medium ]">
						<div class="[ card-grid ] [ flex-space-between ] [ flex-align-baseline ]">
							<div class="footer-logo">
								<a aria-label="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php
										$img = get_field('company_logo', 'option');

										include( get_template_directory() . '/template-parts/snippets/img.php');
									?>
								</a>
							</div>

							<div>
								<?php get_template_part('template-parts/snippets/socials'); ?>
							</div>
						</div>

						<div class="[ tiny ] [ medium ]">
							<div class="footer--details flex">
								<div>
									Copyright &copy; <?php echo date("Y"); ?>
								</div>
								<div>
									Company no. 02507861
								</div>
								<div>
									<a href="#" target="_blank" title="Link opens in a new tab">
										Accessibility Index
									</a>
								</div>
							</div>
							
						</div>
					</div>

					<div class="footer-small-print [ tiny ] [ medium ] [ flex-end ] [ color-grey ]">
						<div class="flex--item">
							<a class="no-underline" href="https://adstyl.es/" target="_blank" title="Footer link opens in a new tab">
								Design
							</a>
						</div>
						&nbsp; | &nbsp;
						<div class="flex--item">
							<a class="no-underline" href="https://jburt.co.uk" target="_blank" title="Footer link opens in a new tab">
								Development
							</a>
						</div>
					</div>
				</div>

			</footer>

			<?php wp_footer(); ?>

		</main>
	</body>
</html>