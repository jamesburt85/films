<?php 

	function wpb_login_logo() { ?>
	    <style type="text/css">
	        #login h1 a, .login h1 a {
			background-image: url(<?php echo get_template_directory_uri() . '/svg/inline-fk-logo.svg'; ?>);
	        height:100px;
	        width:300px;
	        background-size: 300px 100px;
	        background-repeat: no-repeat;
	        padding-bottom: 10px;
	        }
	        body.login {
	            background: #333;
	            min-width: 0;
	            color: #444;
	            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
	            font-size: 13px;
	            line-height: 1.4;
	        }
	        body.login #login #nav a,
	        body.login #login #backtoblog a {
	        	color: #fff;
	        }
	        body.login #login #nav a:hover,
	        body.login #login #backtoblog a:hover {
	        	text-decoration: underline;
	        }
	    </style>
	<?php }
	add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

	function wpb_login_logo_url() {
	    return home_url();
	}
	add_filter( 'login_headerurl', 'wpb_login_logo_url' );
	 
	function wpb_login_logo_url_title() {
	    return 'Your Site Name and Info';
	}
	add_filter( 'login_headertext', 'wpb_login_logo_url_title' );

?>