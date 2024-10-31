<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMS_Enqueue_Scripts
{

	/*
	* MXSMS_Enqueue_Scripts
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
		add_action( 'admin_enqueue_scripts', array( 'MXSMS_Enqueue_Scripts', 'mxsms_enqueue' ) );

	}

		public static function mxsms_enqueue()
		{

			wp_enqueue_style( 'mxsms_font_awesome', MXSMS_PLUGIN_URL . 'assets/font-awesome-4.6.3/css/font-awesome.min.css' );

			wp_enqueue_style( 'mxsms_admin_style', MXSMS_PLUGIN_URL . 'includes/admin/assets/css/style.css', array( 'mxsms_font_awesome' ), MXSMS_PLUGIN_VERSION, 'all' );

			wp_enqueue_script( 'mxsms_admin_script', MXSMS_PLUGIN_URL . 'includes/admin/assets/js/script.js', array( 'jquery' ), MXSMS_PLUGIN_VERSION, false );

		}

}