jQuery( document ).ready( function( $ ){

	$( '#mx-receive-email-input' ).on( 'change', function() {

		var mx_can_send_email = 0;

		if( $( this ).prop( 'checked' ) ) {

			mx_can_send_email = 1;

		}

		var data = {

			'action'			:  'mxsms_can_send_email',
			'nonce'				: 	mxsms_data_obj.nonce,
			'mx_can_send_email'	: 	mx_can_send_email

		};

		// $.ajax
			jQuery.post( mxsms_data_obj.ajax_url, data, function( response ) {

				if( mx_can_send_email === 0 ) {

					alert( 'You have unsubscribed!' );

				} else {

					alert( 'You are subscribed!' );

				}				

			} );

		

	} );

} );