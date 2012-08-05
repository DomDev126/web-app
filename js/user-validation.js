/**
 * I Have Plans -- User validation for sign-up
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */

$(document).ready(function () {
	var userAvailable = $( '.user-available' ),
		passwordReqs = 0,
		passwordPass = $( '.password-available' ),
		emailPass = $( '.email-available' );

	$( "#username" ).on( 'change', function (ev) {
		
		var username = $(this).val();

		userAvailable.attr( 'data-status', 'unchecked' );


		if( username.length >= 3 && username.length <=25 ) {
			
			var ajax = $.post('check-username.php', {
				
				'username' : username

			});

			ajax.done( function (data) {
			
				if(data == 'available') {

					userAvailable.attr('data-status', 'available').html('Available');

				} else {

					userAvailable.attr('data-status', 'unavailable').html('Unavailable');

				}
		});

		} else { 

			userAvailable
				.attr('data-status', 'unavailable')
				.html('Unavailable');

		}

	});


	$('#password').on('change', function () {
		var password = $(this).val();



			if( password.length < 3) {
				
				passwordPass.attr( 'data-status', 'unavailable' ).html( 'Too small' );

			 }else if ( password.length > 25 ) {

			 	passwordPass.attr( 'data-status', 'unavailable' ).html( 'Too Large' );
			 	 
			 }else {

			 	passwordPass.attr( 'data-status', 'available' ).html( 'Looks good' );

			 };

	});


	$('#email').on('change', function () {
		var email = $(this).val();

		if ( email.length< 4 || email.length > 30 ) {

			emailPass.attr( 'data-status', 'unavailable' ).html( 'Try again' );

		} else {

			emailPass.attr( 'data-status', 'available' ).html( 'Awesome' );

		}
	
	});




	$('form').on('submit', function (ev) {

		if( userAvailable.attr('data-status') =="unchecked"|| userAvailable.attr('data-status') == "unavailable" ) {

			ev.preventDefault();

		}

	});

});