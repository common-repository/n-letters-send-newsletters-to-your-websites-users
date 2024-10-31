<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMS_Update_Email_Send_Ability
{

	public static function mxsms_update_ajax()
	{

		add_action( 'wp_ajax_mxsms_can_send_email', array( 'MXSMS_Update_Email_Send_Ability', 'mxsms_update' ) );

	}

		public static function mxsms_update()
		{

			if( empty( $_POST['nonce'] ) ) wp_die();

			if( wp_verify_nonce( $_POST['nonce'], 'mxsms_nonce_request' ) ) {
				
				$user_data = wp_get_current_user();	

				$update_user = update_user_meta( $user_data->ID, 'mx_can_send_email', sanitize_text_field( $_POST['mx_can_send_email'] ) );

				// var_dump( $update_user );

			}

			wp_die();

		}



}