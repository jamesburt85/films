<?php
# Get the ACF Fields
$acf_fields = get_fields();
// echo "<pre>";
// print_r($acf_fields);
// echo "</pre>";

# If there are any fields
if ( !empty( $acf_fields['flexible_content'])) {

	# Count a section
	$section_i = 1;
	$section_dir = get_template_directory() . '/template-parts/acf/';
	// $next_section_i = 2;
	
	# acf wrapper
	echo '<div class="acf-wrapper acf-wrapper__blocks">';

	# Loop through the sections
	foreach ($acf_fields['flexible_content'] as $section):

		$sectionClasses = '';
		if (!empty($section['acf_fc_layout'])) { 
			$sectionClasses .= ' ' . $section['acf_fc_layout'];
		}
		if (!empty($section['colour_scheme'])) { 
			$sectionClasses .= ' ' .'block--' . $section['colour_scheme'];
		}
		if ($section['acf_fc_layout'] == 'hero_block') { 
			$sectionClasses .= ' full-bleed';
		}
		
		$section_i++;
		// $next_section_i++;
		?>
		<div <?php if (!empty($section_id)) { ?> id="<?php echo $section['section_id']; ?>" <?php } 
			// data-section-num="'.$section_i.'"
			?>
			class="clearfix js-section-block <?php echo $sectionClasses ?>">
			<div class="block--inner-wrap">
				<div class="block--content-wrap">
					<div class="block--content">
						<?php # If a file exists in includes/sections/ with this layout name
						if( file_exists( $section_dir . $section['acf_fc_layout'].'.php'))
						    include( $section_dir . $section['acf_fc_layout'].'.php');
						else
							include( $section_dir . 'default.php');
						?>
					</div>
				</div><?php //--content-wrap ?>
			</div><?php //--inner-wrap ?>
		</div><?php // ?>

	<?php endforeach; // end of loop through sections

	# Close acf wrapper
	echo '</div>';

# There's no ACF content
} else { ?>
	<div class="section-block">
		<div class="block--inner-wrap ">
			<?php the_content(); 
			// get_template_part( 'template-parts/content', get_post_format() );
			?>
		</div>
	</div>
<?php };
