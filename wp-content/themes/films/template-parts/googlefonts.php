<?php 
	$GoogleFontURL = 'https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700';
?>

<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />

<link rel="preload"
      as="style"
      href="<?php echo $GoogleFontURL; ?>&display=swap" />

<link rel="stylesheet"
      href="<?php echo $GoogleFontURL; ?>&display=swap"
      media="print" onload="this.media='all'" />