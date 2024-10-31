<?php

class MXSMS_Unsubscribe
{

	public static function add_shorcode() {

		// search result
		add_shortcode( 'mxsms_unsubscribe_page', array( 'MXSMS_Unsubscribe', 'mx_unsubscribe' ) );

	}

		// 
		public static function mx_unsubscribe() {

			ob_start(); 

				if( ! is_user_logged_in() ) { 

					echo 'You must be logged in!';

					return;

				}

				// user data
				$user_data = wp_get_current_user();				

				$user_available = get_user_meta( $user_data->ID, 'mx_can_send_email', true );

				$input_checked = 'checked';

				if( $user_available == '0' ) {

					$input_checked = '';

				}

			?>

				<div class="mx-receive-email">
					
					<input type="checkbox" id="mx-receive-email-input" <?php echo $input_checked; ?> />

					<label for="mx-receive-email-input">Send the emails from this website to my email.</label>

				</div>

			<?php
			return ob_get_clean();

		}

}