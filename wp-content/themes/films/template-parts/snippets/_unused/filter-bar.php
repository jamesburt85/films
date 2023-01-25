<?php 
	// get an array of all terms
	if ($postType == 'work_cpt') {
		$terms = get_terms('work_category');
	} else {
		$terms = get_terms('category');
	}
	// $assetClassArray = $_GET['asset_class'];
	// $assetClassArray2 = explode('&',$_SERVER["QUERY_STRING"]);
	// echo '<pre>';
	// print_r($terms);
	// print_r($_GET['asset_class']);
	// print_r($assetClassArray);
	// echo '</pre>';
?>

<div class="filter-bar">
	<div class="filter-bar--inner-wrapper">
		<div class="filter-bar--filter-list">
			
			<h4 class="filter-bar-heading type-subtitle">Work by competency:</h4>

			<?php if ($terms) {
				foreach ($terms as $term) { ?>
					<?php 
						$link 				= get_term_link( $term );
						$term_id	 		= $term->term_id;
						$name				= $term->name;
						$slug	 			= $term->slug;
						$term_group	 		= $term->term_group;
						$term_taxonomy_id	= $term->term_taxonomy_id;
						$taxonomy	 		= $term->taxonomy;
						$description		= $term->description;
						$parent	 			= $term->parent;
						$count	 			= $term->count;
						$filter	 			= $term->filter;
					?>
					<a class="filter-bar--link type-block-link rpm-underline" href="<?php echo $link; ?>"><?php echo $term->name; ?></a>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>