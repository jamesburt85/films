<?php
	// ACF DUMP
	// echo "<pre>"; print_r($section); echo "</pre>";
?>

<?php
	
	$video_url			= $section['video_url'];

	$videoType 			= getVideoType($video_url);
	if ($videoType == 'vimeo') {
		$vimID 			= getVimeoID($video_url);
	} elseif ($videoType == 'youtube'){
		$YtID 			= getYouTubeID($video_url);
	}

	// BACKGROUND VIDEO Var
	// $backgroundVideo = true;

	// echo "<pre>"; print_r($videoType); echo "</pre>";

?>

<?php if(!empty($video_url)): ?>

	<?php // VIMEO ?>
	<?php if ($videoType == 'vimeo'): ?>
		<?php if ($backgroundVideo): ?>
			<div class="iframe-wrapper iframe-wrapper__background">
				<iframe class="vimeoPlayer" src="https://player.vimeo.com/video/<?php echo $vimID; ?>?background=1" frameborder="0"></iframe>
			</div>
		<?php else: ?>
			<div class="iframe-wrapper">
				<iframe class="vimeoPlayer" src="https://player.vimeo.com/video/<?php echo $vimID; ?>" frameborder="0"></iframe>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php // YOUTUBE ?>
	<?php if ($videoType == 'youtube'): ?>
		<?php if ($backgroundVideo): ?>
			<div class="iframe-wrapper iframe-wrapper__background">
				<iframe class="ytplayer" src="https://www.youtube.com/embed/<?php echo $YtID; ?>?autoplay=1&controls=0&loop=1&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		<?php else: ?>
			<div class="iframe-wrapper">
				<iframe class="ytplayer" type="text/html"
					src="https://www.youtube.com/embed/<?php echo $YtID; ?>?rel=0&showinfo=0"
					frameborder="0" allowfullscreen></iframe>
			</div>
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?>

