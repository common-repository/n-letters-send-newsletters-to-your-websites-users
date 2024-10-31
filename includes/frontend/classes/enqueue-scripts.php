<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMS_Enqueue_Scripts_Frontend
{

	/*
	* MXSMS_Enqueue_Scripts_Frontend
	*/
	public function __construct()
	{

	}

	/*
	* Registration of styles and scripts
	*/
	public static function mxsms_register()
	{

		// register scripts and styles
		add_action( 'wp_enqueue_scripts', array( 'MXSMS_Enqueue_Scripts_Frontend', 'mxsms_enqueue' ) );

	}

		public static function mxsms_enqueue()
		{

			// wp_enqueue_style( 'mxsms_font_awesome', MXSMS_PLUGIN_URL . 'assets/font-awesome-4.6.3/css/font-awesome.min.css' );
			
			// wp_enqueue_style( 'mxsms_style', MXSMS_PLUGIN_URL . 'includes/frontend/assets/css/style.css', array( 'mxsms_font_awesome' ), MXSMS_PLUGIN_VERSION, 'all' );
			
			wp_enqueue_script( 'mxsms_script', MXSMS_PLUGIN_URL . 'includes/frontend/assets/js/script.js', array( 'jquery' ), MXSMS_PLUGIN_VERSION, false );

			wp_localize_script( 'mxsms_script', 'mxsms_data_obj', array(
				
				'nonce' => wp_create_nonce( 'mxsms_nonce_request' ),

				'ajax_url' => admin_url( 'admin-ajax.php' )

			) );
		
		}

}