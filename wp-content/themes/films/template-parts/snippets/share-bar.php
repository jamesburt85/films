<?php 

	$link 				= get_the_permalink();
	$source 			= get_bloginfo( 'name' );
	$twitterUser 		= get_field('twitter_handle', 'option');
	// $twitterUser 		= 'twitterhandlegoeshere';
	$text 				= 'Check out '.get_the_title().' from ' . $source;

?>

<script type="text/javascript">

	jQuery(document).ready(function() {

	  ////////////////////
	  /// WEB SHARE API //
	  ////////////////////

	  const shareButton = $('.share-button');
	  const shareDialog = $('.share-dialog');
	  const closeButton = $('.close-button');

	  shareButton.on( "click", function() {
	    if (navigator.share) { 
	     navigator.share({
	        title: '<?php echo get_the_title(); ?>',
	        url: '<?php echo $link; ?>'
	      }).then(() => {
	        console.log('Thanks for sharing!');
	      })
	      .catch(console.error);
	      } else {
	          shareDialog.addClass('is-open');
	      }
	  });

	  closeButton.on( "click", function() {
	    shareDialog.removeClass('is-open');
	  });


	});

</script>

<div class="share-bar">
	
	<div class="share-dialog flow">
	  <header>
	    <h3 class="dialog-title">Share this page</h3>
	    <button class="close-button"><svg><use href="#close"></use></svg></button>
	  </header>
	  <div class="targets">
	    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($link); ?>" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($link); ?>', '', 'width=900, height=500, toolbar=no, status=no'); return(false);" class="button sr-button share-button">
	      <?php get_template_part('svg/inline', 'icon-facebook.svg'); ?>
	      <span>Facebook</span>
	    </a>
	    
	    <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo urlencode($link); ?>&via=<?php echo $twitterUser; ?>" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urlencode($text); ?>&amp;url=<?php echo urlencode($link); ?>', '', 'width=650, height=350, toolbar=no, status=no'); return(false);" class="button sr-button share-button">
	      <?php get_template_part('svg/inline', 'icon-twitter.svg'); ?>
	      <span>Twitter</span>
	    </a>
	    
	    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($link); ?>&title=<?php the_title(); ?>&source=<?php echo $source; ?>&summary=<?php the_excerpt(); ?>" class="button sr-button share-button">
	      <?php get_template_part('svg/inline', 'icon-linkedin.svg'); ?>
	      <span>LinkedIn</span>
	    </a>
	    
	    <a id="clipboard-btn" class="button sr-button share-by-email" target="_blank" href="mailto:?subject=I wanted you to see this article&amp;body=Check out this <?php echo $link; ?>" title="Share by Email">
	      <?php get_template_part('svg/inline', 'mail-black.svg'); ?>
	      <span>Email</span>
	    </a>
	  </div>
	  <div class="link">
	    <div class="pen-url"><?php echo $link; ?></div>
	    <a id="clipboard-btn" href="javascript:void(0);" class="button copy-link clipboard-btn js-copy-clipboard-btn" data-clipboard-text="<?php echo $link; ?>">Copy Link</a>
	    <!-- <button class="">Copy Link</button> -->
	  </div>
	</div>

	<script type="text/javascript">
		// function fallbackCopyTextToClipboard(text) {
		//   var textArea = document.createElement("textarea");
		//   textArea.value = text;
		  
		//   // Avoid scrolling to bottom
		//   textArea.style.top = "0";
		//   textArea.style.left = "0";
		//   textArea.style.position = "fixed";

		//   document.body.appendChild(textArea);
		//   textArea.focus();
		//   textArea.select();

		//   try {
		//     var successful = document.execCommand('copy');
		//     var msg = successful ? 'successful' : 'unsuccessful';
		//     console.log('Fallback: Copying text command was ' + msg);
		//     jsCopyClipboardBtn.classList.add('is-copy-successful');
		//   } catch (err) {
		//     console.error('Fallback: Oops, unable to copy', err);
		//   }

		//   document.body.removeChild(textArea);
		// }
		// function copyTextToClipboard(text) {
		//   if (!navigator.clipboard) {
		//     fallbackCopyTextToClipboard(text);
		//     return;
		//   }
		//   navigator.clipboard.writeText(text).then(function() {
		//     console.log('Async: Copying to clipboard was successful!');
		//     jsCopyClipboardBtn.classList.add('is-copy-successful');
		//   }, function(err) {
		//     console.error('Async: Could not copy text: ', err);
		//   });
		// }

		// var jsCopyClipboardBtn = document.querySelector('.js-copy-clipboard-btn');

		// jsCopyClipboardBtn.addEventListener('click', function(event) {
		//     copyTextToClipboard('<?php echo $link; ?>');
		// });

	</script>

	<button class="share-button button" type="button" title="Share this article">
	  <svg>
	    <use href="#share-icon"></use>
	  </svg>
	  <span>Share</span>
	</button>

	<svg class="hidden">
	  <defs>
	    <symbol id="share-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></symbol>
	    
	    <symbol id="facebook" viewBox="0 0 24 24" fill="#3b5998" stroke="#3b5998" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></symbol>
	    
	    <symbol id="twitter" viewBox="0 0 24 24" fill="#1da1f2" stroke="#1da1f2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></symbol>
	    
	    <symbol id="email" viewBox="0 0 24 24" fill="#777" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></symbol>
	    
	    <symbol id="linkedin" viewBox="0 0 24 24" fill="#0077B5" stroke="#0077B5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></symbol>
	    
	    <symbol id="close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></symbol>
	  </defs>
	</svg>

</div>