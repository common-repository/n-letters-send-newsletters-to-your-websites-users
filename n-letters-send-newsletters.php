<?php
/*
Plugin Name: N-letters. Send newsletters to your website's users
Plugin URI: https://github.com/Maxim-us/wp-plugin-skeleton
Description: N-letters - plugin for sending newsletters to your website's users.
Author: Maksym Marko
Version: 1.1
Author URI: https://markomaksym.com.ua/
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Unique string - MXSMS
*/

/*
* Define MXSMS_PLUGIN_PATH
*
* E:\OpenServer\domains\my-domain.com\wp-content\plugins\search-machine-subscriptions\search-machine-subscriptions.php
*/
if ( ! defined( 'MXSMS_PLUGIN_PATH' ) ) {

	define( 'MXSMS_PLUGIN_PATH', __FILE__ );

}

/*
* Define MXSMS_PLUGIN_URL
*
* Return http://my-domain.com/wp-content/plugins/search-machine-subscriptions/
*/
if ( ! defined( 'MXSMS_PLUGIN_URL' ) ) {

	define( 'MXSMS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

}

/*
* Define MXSMS_PLUGN_BASE_NAME
*
* 	Return search-machine-subscriptions/search-machine-subscriptions.php
*/
if ( ! defined( 'MXSMS_PLUGN_BASE_NAME' ) ) {

	define( 'MXSMS_PLUGN_BASE_NAME', plugin_basename( __FILE__ ) );

}

/*
* Define MXSMS_TABLE_SLUG
*/
if ( ! defined( 'MXSMS_TABLE_SLUG' ) ) {

	define( 'MXSMS_TABLE_SLUG', 'mxsms_table_slug' );

}

/*
* Define MXSMS_PLUGIN_ABS_PATH
* 
* E:\OpenServer\domains\my-domain.com\wp-content\plugins\search-machine-subscriptions/
*/
if ( ! defined( 'MXSMS_PLUGIN_ABS_PATH' ) ) {

	define( 'MXSMS_PLUGIN_ABS_PATH', dirname( MXSMS_PLUGIN_PATH ) . '/' );

}

/*
* Define MXSMS_PLUGIN_VERSION
*/
if ( ! defined( 'MXSMS_PLUGIN_VERSION' ) ) {

	// version
	define( 'MXSMS_PLUGIN_VERSION', '1.1' ); // Must be replaced before production on for example '1.0'

}

/*
* Define MXSMS_MAIN_MENU_SLUG
*/
if ( ! defined( 'MXSMS_MAIN_MENU_SLUG' ) ) {

	// version
	define( 'MXSMS_MAIN_MENU_SLUG', 'mxsms-search-machine-subscriptions-menu' );

}

/**
 * activation|deactivation
 */
require_once plugin_dir_path( __FILE__ ) . 'install.php';

/*
* Registration hooks
*/
// Activation
register_activation_hook( __FILE__, array( 'MXSMS_Basis_Plugin_Class', 'activate' ) );

// Deactivation
register_deactivation_hook( __FILE__, array( 'MXSMS_Basis_Plugin_Class', 'deactivate' ) );


/*
* Include the main MXSMSSearchMachineSubscriptions class
*/
if ( ! class_exists( 'MXSMSSearchMachineSubscriptions' ) ) {

	require_once plugin_dir_path( __FILE__ ) . 'includes/final-class.php';

	/*
	* Translate plugin
	*/
	add_action( 'plugins_loaded', 'mxsms_translate' );

	function mxsms_translate()
	{

		load_plugin_textdomain( 'mxsms-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

}