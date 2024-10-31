<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// require Route-Registrar.php
require_once MXSMS_PLUGIN_ABS_PATH . 'includes/core/Route-Registrar.php';

/*
* Routes class
*/
class MXSMS_Route
{

	public function __construct()
	{
		// ...
	}
	
	public static function mxsms_get( ...$args )
	{

		return new MXSMS_Route_Registrar( ...$args );

	}
	
}