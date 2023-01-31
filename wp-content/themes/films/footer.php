			<footer class="[ site-footer ] [ flow ]">

				<div class="wrapper">
					<div class="[ card-grid ]">
						<div>
							<h3>Stay in touch with Films@59</h3>
							<p>Infrequent mailing list. We never spam.</p>
						</div>
						<div>
							<span>SIGN UP FORM HERE</span>
							<hr>
						</div>
					</div>
				</div>

				

				<div class="wrapper [ card-grid ]">
					<div>
						<h2>
							Get in touch
						</h2>
					</div>
					<div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>
					</div>
				</div>

				<div class="wrapper footer-navigation-wrapper">

					<div class="[ card-grid ]">
						<div class="footer-logo">
							<a aria-label="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php get_template_part('dist/svg_php/inline', 'f59-logo.svg'); ?>
							</a>
						</div>

						<div class="primary-navigation">
							<?php ray_primary_nav(); ?>
						</div>
						<div class="secondary-navigation">
							<?php ray_secondary_nav(); ?>
						</div>
						
					</div>
					
					<hr>

					<div class="[ card-grid ] footer-small-print">
						<?php ray_footer_menu(); ?>

						Copyright &copy; <?php echo date("Y"); ?>

						<div>
							<div class="flex--item">
								<a href="https://adstyl.es/" target="_blank" title="Footer link opens in a new tab">
									Design &nbsp; | &nbsp;
								</a>
							</div>
							
							<div class="flex--item">
								<a href="https://jburt.co.uk" target="_blank" title="Footer link opens in a new tab">
									Development
								</a>
							</div>
						</div>
					</div>
				</div>
			</footer>

			<?php wp_footer(); ?>

		</main>
	</body>
</html>