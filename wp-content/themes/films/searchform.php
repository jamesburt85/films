<form role="search" method="get" class="searchform tiny" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<input type="text" class="input-group-field" value="" name="s" placeholder="<?php //esc_attr_e( 'Search', 'foundationpress' ); ?>">
		<div class="input-group-button">
			<label>
			   <input type="submit" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>" class="">
			   <?php get_template_part('dist/svg_php/inline', 'arrow-right-thin.svg'); ?>
			</label>
		</div>
	</div>
</form>
