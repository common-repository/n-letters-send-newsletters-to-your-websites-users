<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXSMSCPTclass
{

	/*
	* MXSMSCPTclass constructor
	*/
	public function __construct()
	{		

	}

	/*
	* CPT
	*/
	public static function createCPT()
	{

		add_action( 'init', array( 'MXSMSCPTclass', 'mxsms_custom_init' ) );

	}

	/*
	* Metaboxes
	*/
	public static function createMetaboxes()
	{

		add_action( 'add_meta_boxes', array( 'MXSMSCPTclass', 'mxsms_meta_boxes' ) );

		// 
		add_action( 'save_post_mxsms_subscriptions', array( 'MXSMSCPTclass', 'mxsms_meta_send_test_email_save' ) );

	}

	/*
	* Create a Custom Post Type
	*/
	public static function mxsms_custom_init()
	{
		
		register_post_type( 'mxsms_subscriptions', array(

			'labels'             => array(
				'name'               => 'Newsletter',
				'singular_name'      => 'Newsletter',
				'add_new'            => 'Create letter',
				'add_new_item'       => 'Create new letter',
				'edit_item'          => 'Edit the letter',
				'new_item'           => 'New letter',
				'view_item'          => 'See the letter',
				'search_items'       => 'Find a letter',
				'not_found'          =>  'Letters not found',
				'not_found_in_trash' => 'No letters found in the trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Newsletter'			

			  ),
			'public'             => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'supports'           => array( 'title', 'editor' ),
			'menu_icon'			=> 'dashicons-email-alt'	

		) );

		// Rewrite rules
		if( is_admin() && get_option( 'mxsms_flush_rewrite_rules' ) == 'go_flush_rewrite_rules' )
		{

			delete_option( 'mxsms_flush_rewrite_rules' );

			flush_rewrite_rules();

		}

	}

	// create metaboxes
	static public function mxsms_meta_boxes()
	{

		add_meta_box(
			'mxsms_meta_count_of_available_users',
			'Count of available users',
			array( 'MXSMSCPTclass', 'mxsms_meta_count_of_available_users_callback' ),
			array( 'mxsms_subscriptions' ),
			'normal'
		);

		// test send
		add_meta_box(
			'mxsms_meta_send_test_email',
			'Send a test letter',
			array( 'MXSMSCPTclass', 'mxsms_meta_send_test_email_callback' ),
			array( 'mxsms_subscriptions' ),
			'normal'
		);

	}

		// count of users
		static public function mxsms_meta_count_of_available_users_callback()
		{
			?>

			<p><b><?php echo count( mxsms_get_available_users() ); ?></b> users will receive your email.</p>

		<?php }

		// send test email
		static public function mxsms_meta_send_test_email_callback( $post )
		{

			// check nonce
			wp_nonce_field( 'mxsms_meta_box_test_email_action', 'mxsms_meta_box_test_email_nonce' );

			$send_to_email = get_post_meta( $post->ID, '_mxsms_subsc_test_email', true );

			if( $send_to_email == false ) {

				$user1 = get_user_by( 'ID', 1 );

				$send_to_email = $user1->user_email;

			}

			$was_sent = get_post_meta( $post->ID, 'mx_email_sent', true );

			if( $was_sent == 'sent' ) {

				echo '<h2 style="color: green; font-size: 20px; font-weight: bold;">You have already sent this letter to your users.</h2>';

				echo '<p>Please, create a new one letter.</p>';

				?>
				<input type="checkbox" id="mxsms_test_email_send" name="mxsms_test_email_send" checked="checked" disabled />

				<input type="email" id="mxsms_test_email" name="mxsms_test_email" value="<?php echo $send_to_email; ?>" disabled />
				<?php

			} else {

				?>
				<input type="checkbox" id="mxsms_test_email_send" name="mxsms_test_email_send" checked="checked" />

				<input type="email" id="mxsms_test_email" name="mxsms_test_email" value="<?php echo $send_to_email; ?>" />
				<?php

			}
		
		}

		public static function mxsms_meta_send_test_email_save( $post_id )
		{

			if ( ! isset( $_POST['mxsms_meta_box_test_email_nonce'] ) ) 
				return;

			if ( ! wp_verify_nonce( $_POST['mxsms_meta_box_test_email_nonce'], 'mxsms_meta_box_test_email_action') )
				return;

			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
				return;

			if( ! current_user_can( 'edit_post', $post_id ) )
				return;

			// save data
			$email = sanitize_email( $_POST['mxsms_test_email'] );

			update_post_meta( $post_id, '_mxsms_subsc_test_email', $email );

		}

}