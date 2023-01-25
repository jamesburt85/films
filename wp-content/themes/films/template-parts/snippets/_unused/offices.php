<?php 

	# Get the ACF Fields
	$office_fields = get_fields('option');
	// echo "<pre>";
	// print_r($social_fields);
	// echo "</pre>";

	$offices				= $office_fields['offices'];

?>

<?php if ($offices): ?>
	<div class="offices-content">
		<?php foreach ($offices['offices'] as $office):
				$office_name				= $office['office_name'];
				$office_address				= $office['office_address'];
				$office_phone_number		= $office['office_phone_number'];
				$main_office_email_address	= $office['main_office_email_address'];
				$email_addresses			= $office['email_addresses'];
					// $email_title			= $option_fields['email_title'];
					// $email_address			= $option_fields['email_address'];
			?>
			<div class="office">
				<div class="office-details">
					<?php if(!empty($office_name)): ?>
						<h3 class="<?php echo $template; ?>--office_name"><?php echo $office_name ?></h3>
					<?php endif; ?>
					<?php if(!empty($office_address)): ?>
						<p class="<?php echo $template; ?>--office_address"><?php echo $office_address ?></p>
					<?php endif; ?>
					<?php if(!empty($office_phone_number)): ?>
						<p class="<?php echo $template; ?>--office_phone_number"><?php echo $office_phone_number ?></p>
					<?php endif; ?>
					<?php if(!empty($main_office_email_address)): ?>
						<a href="<?php echo $office_page_url ?>" class="<?php echo $template; ?>--main_office_email_address"><?php echo $main_office_email_address ?></a>
					<?php endif; ?>
				</div>
				<div class="office-emails">
					<?php foreach ($email_addresses as $email):
						$email_title = $email['email_title'];
						$email_address = $email['email_address'];
					 ?>
					 	<?php if(!empty($email_title)): ?>
					 		<h5><?php echo $email_title ?></h5>
					 	<?php endif; ?>
					 	<?php if(!empty($email_address)): ?>
					 		<a href="<?php echo $office_page_url ?>" class="<?php echo $template; ?>--email_address"><?php echo $email_address ?></a>
					 	<?php endif; ?>
					<?php endforeach ?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>
