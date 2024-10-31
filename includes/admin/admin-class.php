<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMS_Admin_Main
{

	// list of model names used in the plugin
	public $models_collection = [
		'MXSMS_Main_Page_Model'
	];

	/*
	* MXSMS_Admin_Main constructor
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
		mxsms_require_class_file_admin( 'enqueue-scripts.php' );

		MXSMS_Enqueue_Scripts::mxsms_register();


		// CPT class
		mxsms_require_class_file_admin( 'cpt.php' );

			MXSMSCPTclass::createCPT();

			MXSMSCPTclass::createMetaboxes();

		// CPT class
		mxsms_require_class_file_admin( 'send-email.php' );

		MXSMS_Send_Email::mx_cath_save_post_hook();

	}

	/*
	* Models Connection
	*/
	public function mxsms_models_collection()
	{

		// require model file
		foreach ( $this->models_collection as $model ) {
			
			mxsms_use_model( $model );

		}		

	}

	/**
	* registration ajax actions
	*/
	public function mxsms_registration_ajax_actions()
	{

		// ajax requests to main page
		MXSMS_Main_Page_Model::mxsms_wp_ajax();

	}

	/*
	* Routes collection
	*/
	public function mxsms_routes_collection()
	{

		// sub settings menu item
		MXSMS_Route::mxsms_get( 'MXSMS_Main_Page_Controller', 'settings_menu_item_action', 'NULL', [
			'menu_title' => 'Subsc. Settings',
			'page_title' => 'Subscriptions Settings'
		], 'mxsms_subsc_settings', true );

	}

}

// Initialize
$initialize_admin_class = new MXSMS_Admin_Main();

// include classes
$initialize_admin_class->mxsms_additional_classes();

// include models
$initialize_admin_class->mxsms_models_collection();

// ajax requests
$initialize_admin_class->mxsms_registration_ajax_actions();

// include controllers
$initialize_admin_class->mxsms_routes_collection();