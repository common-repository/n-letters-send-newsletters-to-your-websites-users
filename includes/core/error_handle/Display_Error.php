<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Error Handle calss
*/
class MXSMS_Display_Error
{

	/**
	* Error notice
	*/
	public $mxsms_error_notice = '';

	public function __construct( $mxsms_error_notice )
	{

		$this->mxsms_error_notice = $mxsms_error_notice;

	}

	public function mxsms_show_error()
	{
		add_action( 'admin_notices', function() { ?>

			<div class="notice notice-error is-dismissible">

			    <p><?php echo $this->mxsms_error_notice; ?></p>
			    
			</div>
		    
		<?php } );
	}

}