<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Require class for admin panel
*/
function mxsms_require_class_file_admin( $file ) {

	require_once MXSMS_PLUGIN_ABS_PATH . 'includes/admin/classes/' . $file;

}


/*
* Require class for frontend panel
*/
function mxsms_require_class_file_frontend( $file ) {

	require_once MXSMS_PLUGIN_ABS_PATH . 'includes/frontend/classes/' . $file;

}

/*
* Require a Model
*/
function mxsms_use_model( $model ) {

	require_once MXSMS_PLUGIN_ABS_PATH . 'includes/admin/models/' . $model . '.php';

}

/*
* Get count of available users
*/
function mxsms_get_available_users() {

	// check available users and get emails
	$users = get_users();

	$user_emails = array();

	foreach ( $users as $key => $value ) {

		$user_id = $value->ID;

		$user_email = $value->user_email;

		if( $user_email !== '' ) {

			// user available
			$user_available = get_user_meta( $user_id, 'mx_can_send_email', true );

			// var_dump( $user_available );

			if( $user_available !== '0' ) {

				array_push( $user_emails, $user_email );

			}

		}

	}

	return $user_emails;

}