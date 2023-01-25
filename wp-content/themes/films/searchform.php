<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<input type="text" class="input-group-field" value="" name="s" placeholder="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>">
		<div class="input-group-button">
			<label>
			   <input type="submit" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>" class="button">
			   <?php get_template_part('svg/inline', 'icon-search.svg'); ?>
			</label>
		</div>
	</div>
</form>
