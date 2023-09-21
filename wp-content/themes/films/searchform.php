<?php
	$search_value = '';
	if ( is_tax('kit_category') ) {
		$search_value = 'kit';
	} else if ( is_tax('people_category') ) {
		$search_value = 'people';
	}
?>
<form role="search" method="get" class="searchform tiny" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<input type="text" class="input-group-field" value="" name="s" placeholder="<?php //esc_attr_e( 'Search', 'foundationpress' ); ?>">
		<div class="input-group-button">
			<label>
			   <input type="submit" value="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>" class="">
			   <input type="hidden" name="post_type" value="<?php echo $search_value; ?>" />

			   <?php get_template_part('dist/svg_php/inline', 'arrow-right-thin.svg'); ?>
			</label>
		</div>
	</div>
</form>
