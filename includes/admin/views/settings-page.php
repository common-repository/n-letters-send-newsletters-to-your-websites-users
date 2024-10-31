<div class="mx-main-page-text-wrap">
	
	<h1><?php echo __( 'Subscriptions Settings.', 'mxsms-domain' ); ?></h1>

	<form id="mxsms_save_subsc_data">
		
		<p>
			<span><?php echo __( 'Name of sender.', 'mxsms-domain' ); ?></span>

			<?php

				$sender_name = get_option( '_mxsms_sender_name' );

				if( $sender_name == false ) {

					$sender_name = get_option( 'blogname' );

				} 

			?>
			<input type="text" id="mxsms_name_of_sender" name="mxsms_name_of_sender" value="<?php echo $sender_name; ?>"  />
		</p>

		<p>
			<span><?php echo __( 'Email of sender.', 'mxsms-domain' ); ?></span>

			<?php

				$sender_email = get_option( '_mxsms_sender_email' );

				if( $sender_email == false ) {

					$sender_email = 'noreply@some-website.com';

				}

			?>
			<input type="text" id="mxsms_email_of_sender" name="mxsms_email_of_sender" value="<?php echo $sender_email; ?>"  />
		</p>

		<input type="hidden" id="mxsms_wpnonce" value="<?php echo wp_create_nonce( 'mxsms_nonce_request' ) ;?>" />

		<p>
			<button type="submig" class="is-primary">Save</button>
		</p>

	</form>

</div>

<br>

<div class="mx-shortcode-wrap">
	
	<h3>
		This short code is required to place on a specific page where a user can unsubscribe.
	</h3>

	<p>
		[mxsms_unsubscribe_page]
	</p>

</div>

<br>

<div class="mx-code-example">
	
	<h3>
		HTML email example
	</h3>

	<?php

		$logo_path = MXSMS_PLUGIN_URL . 'assets/icon-n.png';

		$email = htmlspecialchars( '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>
		.mx-mail-wrap {
			margin: 10px auto;
			max-width: 600px;
			padding: 10px;
			background-color: #f0fbf0;
		}
		.mx-mail-logo {
			    background: #fafafa;
			    padding: 10px;
			    -webkit-box-shadow: 0 0 5px 0 rgba(51,51,51,.18);
			    -moz-box-shadow: 0 0 5px 0 rgba(51,51,51,.18);
			    box-shadow: 0 0 5px 0 rgba(51,51,51,.18);
			    height: 100%;
			    position: relative;
			    text-align: center;
		}
		.mx-mail-title {
			text-align: center;
			margin-top: 50px;
		}
		.mx-mail-title a {
			font-size: 25px;
			text-transform: uppercase;
			text-decoration: none;
			font-weight: bold;
			font-family: \'Arial\';
			color: #0056b3;
		}
		.mx-mail-content {
			font-family: \'Arial\';
			font-size: 16px;
			text-align: center;
		}
		.mx-mail-subscription {
			margin-top: 40px;
			margin-bottom: 40px;
			text-align: center;
		}
		.mx-mail-subscription a {
			font-size: 12px;
			color: #0056b3;
			font-family: \'Arial\';
		}
		.mx-mail-add-area {
			margin-top: 40px;
			text-align: center;
		}
		.mx-mail-add-area a {
			font-size: 16px;
			font-weight: 400;
		    text-decoration: none;
		    display: inline-block;
		    border: 1px solid #cd2653;
		    border-radius: 4px;
			text-decoration: none;
			color: #cd2653;
			font-family: \'Arial\';
			padding: 8px 15px;
		}
	</style>
</head>
<body>

	<div class="mx-mail-wrap" style="margin: 10px auto;max-width: 600px;padding: 10px;background-color: #f0fbf0;">
		
		<div class="mx-mail-logo" style="background: #fafafa;padding: 10px;-webkit-box-shadow: 0 0 5px 0 rgba(51,51,51,.18);-moz-box-shadow: 0 0 5px 0 rgba(51,51,51,.18);box-shadow: 0 0 5px 0 rgba(51,51,51,.18);height: 100%;position: relative;text-align: center;">
			<a href="https://domail.com/"><img src="' . $logo_path . '" alt="logo"></a>
		</div>

		<div class="mx-mail-title" style="text-align: center;margin-top: 50px;">
			<a href="https://website.com/" style="font-size: 25px;text-transform: uppercase;text-decoration: none;font-weight: bold;font-family: \'Arial\';color: #0056b3;">Hi, There!</a>
		</div>

		<div class="mx-mail-content" style="font-family: \'Arial\';font-size: 16px;text-align: center;">
			
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, esse fugiat nobis atque voluptatem unde odio accusamus libero, quos, quas delectus saepe dicta! Vitae repellendus nostrum sunt reiciendis eius aperiam.
			</p>			

		</div>

		<div class="mx-mail-subscription" style="margin-top: 40px;margin-bottom: 40px;text-align: center;">
			<a href="https://domain.com/manage-subscriptions/" style="font-size: 12px;color: #0056b3;font-family: \'Arial\';">Manage subscriptions</a>
		</div>

	</div>
	
</body>
</html>', ENT_QUOTES);

	?>

	<textarea style="width: 500px; height: 500px; background: #fff" readonly>
		<?php echo $email; ?>
	</textarea>
</div>