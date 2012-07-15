$(document).ready(function () {

	var tips = $('.tips').hide();

	tips.slideToggle('slow', function() {

		setTimeout(slideUp, 3500)
	})
	
	function slideUp() {

		tips.slideToggle('slow');

	}




var Users = {

	
	init: function ( config ) {

		this.config = config;
		this.bindEvents();
	},
	bindEvents: function () {
		this.config.formInput.on('keyup', this.fetchUsers);



	},

	fetchUsers: function () {
		var self= Users;


		$.ajax({
			url: "check-friends.php",
			type: "POST",
			dataType: "json",
			data: self.config.formInput.serialize(),
			success: function (results) {
				
				 availableUsers = results;
				//return this.availableUsers;

				$( "#addEmail" ).autocomplete({
			
				source: availableUsers
		
		

				});


			}

		});


	},



	autoComplete: function() {
	
		
		

		
	
	}



}

	Users.init({

		formInput: $('#addEmail'),
		userListArea: $('#userList'),
		


	});



});