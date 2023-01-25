<?php 

	$option_fields = get_fields('option');
	// echo "<pre>";
	// print_r($option_fields);
	// echo "</pre>";

	$language_prompt_intro		= $option_fields['language_prompt_intro'] ?? null;
	$currently_on				= $option_fields['currently_on'] ?? null;
	$suggested_language			= $option_fields['suggested_language'] ?? null;

?>

<div class="lang-switcher-prompt js-lang-switcher-prompt">
	<div class="lang-switcher-prompt--prompt">		
		<?php get_template_part('svg/inline', 'onclusive-logo-dark.svg'); ?>
		<div class="prompt--currently-on">
			<?php if (!empty($language_prompt_intro)) { ?>
				<h2 class="prompt--heading"><?php echo $language_prompt_intro ?></h2>
			<?php } ?>
			<?php if (!empty($currently_on)) { ?>
				<p class="prompt--copy"><?php echo $currently_on ?>:</p>
			<?php } ?>
			<?php echo myselector('active'); ?>
		</div>
		<div class="prompt--prompt-to">
			<?php if (!empty($suggested_language)) { ?>
				<p class="prompt--copy"><?php echo $suggested_language ?>:</p>
			<?php } ?>
			<?php echo myselector(); ?>
		</div>
		
	</div>
</div>