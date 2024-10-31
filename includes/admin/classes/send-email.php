<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMS_Send_Email
{

	public static function mx_cath_save_post_hook()
	{

		// 
		add_action( 'save_post_mxsms_subscriptions', array( 'MXSMS_Send_Email', 'mxsms_send_email_to_users' ), 10, 2 );

	}

	public static function mxsms_send_email_to_users( $post_id, $post )
	{


		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		if( ! current_user_can( 'edit_post', $post_id ) ) return;

		if( $post->post_status !== 'publish' ) return;

		// email headers ...
		$title = $post->post_title;

		$message = $post->post_content;

			$sender_name = get_option( '_mxsms_sender_name' );

			if( $sender_name == false ) {

				$sender_name = get_option( 'blogname' );

			}

			$sender_email = get_option( '_mxsms_sender_email' );

			if( $sender_email == false ) {

				$sender_email = 'noreply@some-website.com';

			}

		$sender = $sender_name . ' <' . $sender_email . '>';

		$headers = "From: $sender\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\n";
		$headers .= "MIME-Version: 1.0\n";
		// ... email headers

		// check testing
		if( isset( $_POST['mxsms_test_email_send'] ) ) {

			// add filter
			add_filter( 'wp_mail_content_type', array( 'MXSMS_Send_Email', 'set_html_content_type' ) );

				wp_mail( $_POST['mxsms_test_email'], $title, $message, $headers );

			// remove filter
			remove_filter( 'wp_mail_content_type', array( 'MXSMS_Send_Email', 'set_html_content_type' ) );

			return;

		}

		// check post available
		$was_sent = get_post_meta( $post_id, 'mx_email_sent', true );		

		if( $was_sent !== 'sent' ) {			

			// send email
			// add filter
			add_filter( 'wp_mail_content_type', array( 'MXSMS_Send_Email', 'set_html_content_type' ) );

			$user_emails = mxsms_get_available_users();

			// $user_emails
			foreach ( $user_emails as $key => $value) {

				wp_mail( $value, $title, $message, $headers );

			}			

			// remove filter
			remove_filter( 'wp_mail_content_type', array( 'MXSMS_Send_Email', 'set_html_content_type' ) );


			// close post from email sending
			update_post_meta( $post_id, 'mx_email_sent', 'sent' );

		}

	}

		// mail filter
		public static function set_html_content_type()
		{

			return "text/html";

		}

		

}