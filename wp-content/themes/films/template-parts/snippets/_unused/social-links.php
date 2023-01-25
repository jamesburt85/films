<?php 

	# Get the ACF Fields
	$social_fields = get_fields('option');
	// echo "<pre>";
	// print_r($social_fields);
	// echo "</pre>";

	$social_media_urls		= $social_fields['social_media_urls'];

?>

<?php if ($social_media_urls): ?>
	<ul class="social-links">
		<?php foreach ($social_media_urls as $social):
			$social_channel			= $social['social_channel'];
			$social_url				= $social['social_url'];
			if ($social_channel == 'linkedin') {
				$s = 'linked';
			} elseif ($social_channel == 'twitter') {
				$s = 'twitter';
			} elseif ($social_channel == 'instagram') {
				$s = 'insta';
			}
			?>
			<li class="social-link">
				<a href="<?php echo $social_url ?>"><?php get_template_part('svg/inline', 'icon-'.$s.'.svg'); ?></a>
			</li>
		<?php endforeach ?>
	</ul>
<?php endif ?>
