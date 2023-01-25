			<footer class="[ site-footer ]">
				<div class="wrapper">

					<div class="footer-logo">
						<a aria-label="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php get_template_part('dist/svg_php/inline', 'f59-logo.svg'); ?>
						</a>
					</div>

					<h2>[footer content]</h2>
					<?php ray_footer_menu(); ?>
					Copyright &copy; <?php echo date("Y"); ?>
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
			</footer>

			<?php wp_footer(); ?>

		</main>
	</body>
</html>