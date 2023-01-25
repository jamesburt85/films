<?php  if( !is_front_page() ) { ?>
	<?php if ( function_exists('yoast_breadcrumb') ) { ?>
		<div class="breadcrumbs--wrapper js-breadcrumbs">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
		  		<?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
			</div>
		</div>
	<?php }?>
<?php } ?>