<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMS_Main_Page_Controller extends MXSMS_Controller
{
	
	public function index()
	{

		$model_inst = new MXSMS_Main_Page_Model();

		$data = $model_inst->mxsms_get_row( NULL, 'id', 1 );

		return new MXSMS_View( 'main-page', $data );

	}

	public function submenu()
	{

		return new MXSMS_View( 'sub-page' );

	}

	public function hidemenu()
	{

		return new MXSMS_View( 'hidemenu-page' );

	}

	public function settings_menu_item_action()
	{

		return new MXSMS_View( 'settings-page' );

	}

}