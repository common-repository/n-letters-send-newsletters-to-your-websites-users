<div class="mx-main-page-text-wrap">
	
	<h1><?php echo __( 'Settings Page', 'mxsms-domain' ); ?></h1>

	<div class="mx-block_wrap">

		<form id="mxsms_form_update" class="mx-settings" method="post" action="">

			<h2>Default script</h2>
			<textarea name="mxsms_some_string" id="mxsms_some_string"><?php echo $data->some_field; ?></textarea>

			<p class="mx-submit_button_wrap">
				<input type="hidden" id="mxsms_wpnonce" name="mxsms_wpnonce" value="<?php echo wp_create_nonce( 'mxsms_nonce_request' ) ;?>" />
				<input class="button-primary" type="submit" name="mxsms_submit" value="Save" />
			</p>

		</form>

	</div>

</div>