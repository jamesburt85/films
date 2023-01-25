<?php 
	// get an array of all terms
	// $project_location 		= get_terms('project_location');
	// }

	// else {
	// 	$team_expertise = get_terms('category');
	// }
	// $assetClassArray = $_GET['asset_class'];
	// $assetClassArray2 = explode('&',$_SERVER["QUERY_STRING"]);
	// echo '<pre>';
	// print_r($team_expertise);
	// print_r($_GET['asset_class']);
	// print_r($assetClassArray);
	// echo '</pre>';
	// if ($postType == 'work_cpt') {
	// $tag 					= get_terms('work_tag');

	$postType = get_post_type();

	// if ($postType == 'cpt_team'):

	// 	$team_expertise 		= get_terms('team_expertise');
	// 	// echo "<pre>"; print_r($team_expertise); echo "</pre>";

	// 	$filterCats = array(
	// 		'Specialism' => $team_expertise
	// 	);

	// 	$dropdownFilterBar = true;

	// elseif ($postType == 'cpt_commentary'):

	// 	$categories 		= get_terms('commentary_category');
	// 	// echo "<pre>"; print_r($categories); echo "</pre>";

	// 	$filterCats = array(
	// 		'Category' => $categories
	// 	);

	// 	$dropdownFilterBar = true;

	// if ($postType == 'post' || $postType == 'whitepaper_cpt' || $postType == 'cs_cpt' || $postType == 'webinar_cpt'):
	if ($postType == 'post'):

		// $categories 		= get_terms('category', 'hide_empty=1');
		// echo "<pre>"; print_r($categories); echo "</pre>";

		// Get the categories for post and product post types
		$categories = get_terms('category', array(
		 	'post_type' => array($postType),
		 	'fields' => 'all',
		 	'hide_empty' => 1
		));

		$filterCats = array(
			'Category' => $categories
		);

		$dropdownFilterBar = false;

	endif;

	$category = get_queried_object();
	$term_id = (isset($category->term_id) ? $category->term_id : false);
	if (!empty($term_id)) {
		$archiveCatID = $term_id;
	}

?>

<?php if (!empty($filterCats['Category'])) { ?>

	<?php 
	// echo "<pre>";
		// print_r($filterCats);
	// echo "</pre>";
	?>

	<?php if ($dropdownFilterBar) { ?>
		
		<div class="filter-bar filter-bar__dropdowns">
			<div class="filter-bar--inner-wrapper">
				<ul>
					<?php foreach ($filterCats as $key => $value): ?>
						<li class="filter-bar-heading type-subtitle">
							<?php echo $key; ?>
							<?php get_template_part('svg/inline', 'lines-white.svg'); ?>
							<?php // echo "<pre>"; print_r($value); echo "</pre>"; ?>
							<ul>
								<li><a class="button <?php if (!is_category()) { echo 'current'; } ?>" href="<?php echo get_post_type_archive_link($postType); ?>">All</a></li>
								<?php foreach ($value as $term) {
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

										if ($archiveCatID == $term_id) {
											$isCurrent = true;
										}
									?>
									<li><a class="button <?php if(!empty($isCurrent) && $isCurrent == true) { echo 'is-current'; } ?>" href="<?php echo $link; ?>"><?php echo $term->name; ?></a></li>
								<?php } ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

	<?php } else { ?>

		<div class="filter-bar">
			<div class="filter-bar--inner-wrapper">
				<div class="filter-bar--filter-list">

					<?php foreach ($filterCats as $key => $value): ?>

						<div>
							
							<h6 class="filter-bar-heading"><?php the_field('archive_filter_heading', 'option'); ?></h6>

							<?php // echo "<pre>"; print_r($value); echo "</pre>"; ?>
							<ul>
								<li><a class="button <?php if (!is_category()) { echo 'current'; } ?>" href="<?php echo get_post_type_archive_link($postType); ?>">All</a></li>
								<?php foreach ($value as $term) {
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

										if ($archiveCatID == $term_id) {
											$isCurrent = true;
										}
									?>
									<li><a class="button <?php if(!empty($isCurrent) && $isCurrent == true) { echo 'current'; } ?>" href="<?php echo $link; ?>"><?php echo $term->name; ?></a></li>
									<?php $isCurrent = false; ?>
								<?php } ?>
							</ul>

						</div>

					<?php endforeach; ?>

				</div>
			</div>
		</div>

	<?php } ?>

<?php } ?>

<?php $dropdownFilterBar = null; ?>