<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Main page Model
*/
class MXSMS_Main_Page_Model extends MXSMS_Model
{

	/*
	* Observe function
	*/
	public static function mxsms_wp_ajax()
	{

		add_action( 'wp_ajax_mxsms_update_subsc_settings', array( 'MXSMS_Main_Page_Model', 'update_subsc_data' ), 10, 1 );

	}

	/*
	* Prepare for data updates
	*/
	public static function update_subsc_data()
	{
		
		// Checked POST nonce is not empty
		if( empty( $_POST['nonce'] ) ) wp_die( '0' );

		// Checked or nonce match
		if( wp_verify_nonce( $_POST['nonce'], 'mxsms_nonce_request' ) ){

			// Update data
			$array_error = array();
			// email
			$email = sanitize_email( $_POST['email_of_sender'] );

			$save_email = update_option( '_mxsms_sender_email', $email );

			array_push( $array_error, $save_email );

			// name
			$name = sanitize_text_field( $_POST['name_of_sender'] );

			$save_name = update_option( '_mxsms_sender_name', $name );

			array_push( $array_error, $save_name );

			if( in_array( true, $array_error) ) {

				echo '1';

			} else {

				echo '0';

			}

		}

		wp_die();

	}
	
}