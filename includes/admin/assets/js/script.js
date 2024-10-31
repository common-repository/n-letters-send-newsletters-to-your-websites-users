jQuery( document ).ready( function( $ ) {

	$( '#mxsms_save_subsc_data' ).on( 'submit', function( e ){

		e.preventDefault();

		var nonce = $( this ).find( '#mxsms_wpnonce' ).val();

		var email_of_sender = $( '#mxsms_email_of_sender' ).val();

		if( email_of_sender === '' ) {

			alert( 'Fill in the sender\'s email!' );

			return false;

		}

		var name_of_sender = $( '#mxsms_name_of_sender' ).val();

		if( name_of_sender === '' ) {

			alert( 'Fill in the sender\'s name!' );

			return false;

		}

		var data = {

			'action': 'mxsms_update_subsc_settings',
			'nonce': nonce,
			'name_of_sender': name_of_sender,
			'email_of_sender': email_of_sender

		};

		jQuery.post( ajaxurl, data, function( response ){

			if( response === '1' ) {

				alert( 'Data saved!' );

			} else {

				alert( 'Please, make some changes!' );

			}
			// alert( 'Value updated.' );

		} );

	} );

} );