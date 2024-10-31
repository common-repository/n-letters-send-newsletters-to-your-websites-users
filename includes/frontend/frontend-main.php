<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMS_FrontEnd_Main
{

	/*
	* MXSMS_FrontEnd_Main constructor
	*/
	public function __construct()
	{

	}

	/*
	* Additional classes
	*/
	public function mxsms_additional_classes()
	{

		// enqueue_scripts class
		mxsms_require_class_file_frontend( 'enqueue-scripts.php' );

		MXSMS_Enqueue_Scripts_Frontend::mxsms_register();

		// unsubscribe page
		mxsms_require_class_file_frontend( 'shortcode-unsubscribe.php' );

			MXSMS_Unsubscribe::add_shorcode();

		// update data
			mxsms_require_class_file_frontend( 'update-email-send-ability.php' );

			MXSMS_Update_Email_Send_Ability::mxsms_update_ajax();
			

		

	}

}

// Initialize
$initialize_admin_class = new MXSMS_FrontEnd_Main();

// include classes
$initialize_admin_class->mxsms_additional_classes();