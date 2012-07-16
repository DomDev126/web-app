$(document).ready(function () {
	var userAvailable = $( '.user-available' );
	var passwordReqs = 0;

	$( "#username" ).on( 'change', function (ev) {
		
		var username = $(this).val();

		userAvailable.attr( 'data-status', 'unchecked' );


		if( username.length >= 3 && username.length <=25 ) {
			
			var ajax = $.post('check-username.php', {
				
				'username' : username

			});

			ajax.done( function (data) {
			
				if(data == 'available') {

					userAvailable.attr('data-status', 'available').html('available');

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


	$('form').on('submit', function (ev) {

		if( userAvailable.attr('data-status') =="unchecked"|| userAvailable.attr('data-status') == "unavailable" ) {

			ev.preventDefault();

		}

	});

});