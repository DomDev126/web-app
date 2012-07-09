$(document).ready(function () {
	var userAvailable = $('.user-available');
	var passwordReqs = 0;

	$("#username").on('change', function (ev) {
		var username = $(this).val();

		userAvailable.attr('data-status', 'unchecked');


		if(username.length >= 3 && username.length <=25 ) {
			var ajax = $.post('check-username.php', {
				'username' : username

			});

			ajax.done(function (data) {
				if(data == 'available') {
					userAvailable.attr('data-status', 'available').html('available');
				} else {
					userAvailable.attr('data-status', 'unavailable').html('Unavailable');
				}
		});

		} else {
			userAvailable
				.attr('data-status', 'unavailable')
				.html('Unavailable')
			;

		}

	});


	$("#password").on('keyup', function (ev) {
		var password = $(this).val();

		passwordReqs = 0;

		if(password.length >5) {
			passwordReqs++;
			$('.pass-length').attr('data-state', 'achieved');

		}

		if(password.match(/[a-z]/)) {
			passwordReqs++;
			$('.pass-lower').attr('data-state', 'achieved');

		}
		if(password.match(/[A-Z]/)) {
			passwordReqs++;
			$('.pass-upper').attr('data-state', 'achieved');

		}
		if(password.match(/\d/)) {
			passwordReqs++;
			$('.pass-num').attr('data-state', 'achieved');

		}
		if(password.match(/[^a-zA-Z0-9]/)) {
			passwordReqs++;
			$('.pass-symbol').attr('data-state', 'achieved');

		}

	});

	$('#city').on('change', function (ev) {
		var city = $(this).val();

			if(city.match(/[^a-zA-z]/)) {
				$('#city-wrong').addClass('wrong');
			} else {
				$('#city-wrong').removeClass('wrong');
			}
	});



	$('.country').on('click', function() {
		var country = $(this);
		console.log(country);
		$('#address"').remove('#container')
		
		if(country.val() == "us") {
			$.get('countries.html #container', function (data) {
			$("#address").append(data) 
			});
		}
		if(country.val() == "canada") {
			$.get('countries.html #container', function (data) {
			$("#address").append(data) 
			});
		}

	
	});

	$('form').on('submit', function (ev) {
		if(userAvailable.attr('data-status') =="unchecked"|| userAvailable.attr('data-status') == "unavailable"|| passwordReq < 5 ) {
			ev.preventDefault();
		}

	});

});